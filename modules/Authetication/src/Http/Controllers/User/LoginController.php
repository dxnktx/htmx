<?php

namespace Modules\Authetication\src\Http\Controllers\User;
use Modules\Authetication\src\Models\Role;
use Modules\Authetication\src\Http\Controllers\Controller;
use Modules\Authetication\src\Http\Requests\User\LoginUserRequest;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Modules\Authetication\src\Repositories\User\UserRepositoryInterface;
use Modules\TripBooking\src\Repositories\Student\StudentRepositoryInterface;

use Modules\Authetication\src\Models\User;
use Modules\Authetication\src\Http\Requests\Auth\LoginRequest;
use Modules\Authetication\src\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;
    protected $studentRepository;

    /**
     * UserController constructor.
     * 
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository, StudentRepositoryInterface $studentRepository)
    {
        $this->userRepository = $userRepository;
        $this->studentRepository = $studentRepository;
    }

    public function create()
    {
        if(!auth()->check()) {
            return view('Authetication::user.login');
        } else {
            return redirect('/');
        }        
    }
    
    public function store(LoginUserRequest $request): RedirectResponse
    {
        $auth_key = '';
        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $response = Http::withHeaders([
            'api-key' => env('API_KEY')
        ])->get(env('API_GET_TOKEN_URL'), [

        ]);

        if($response['status'] == 200) {
           $auth_key = $response['data'];
        } else {
            return redirect()->route('login')->with('error', __($response['description']));
        }
        
        $response = Http::withHeaders([
            'auth-key'    => $auth_key,
        ])->post(env('API_LOGIN_URL'), [
            'username'   => $request->username,
            'password'   => $request->password
        ]);
        
        if($response['status'] == 200)
        {
            if(!auth()->guard('web')->attempt($credential)){
                // nếu đăng nhập thành công thì tiến hành tạo user
                $user = $this->userRepository->createApiUser($request, $response['data']);
                
                // phân quyền cho user mới là thành viên
                $user_role = Role::where('slug','user')->first();
                $user->roles()->attach($user_role);
                
                $this->studentRepository->createApiStudent($response['data']);
            }
            if(auth()->guard('web')->attempt($credential)){
                if(auth()->user()->can('browse-dashboard')) {
                    return redirect()->route('dashboard');
                } else if(isset(auth()->user()->dia_chi)) {
                    return redirect()->route('trip_detail', auth()->user()->ma_sinh_vien);                    
                } else {
                    return redirect()->route('trip_create');
                }
            }
        } else {
            if(auth()->guard('web')->attempt($credential)){
                if(auth()->user()->can('browse-dashboard')) {
                    return redirect()->route('dashboard');
                } else if(isset(auth()->user()->ma_sinh_vien)) {
                    return redirect()->route('trip_detail', auth()->user()->ma_sinh_vien);                    
                } else {
                    return redirect()->route('trip_create');
                }
            } else {
                return redirect()->route('login')->with('error', __('Information is not correct.'));
            }
        }
    }    
    
    public function destroy(Request $request): RedirectResponse
    {
        // Đăng xuất khỏi ứng dụng
        auth()->guard('web')->logout();

        // Hủy session hiện tại
        $request->session()->invalidate();

        // Tạo token mới cho session
        $request->session()->regenerateToken();

        // Chuyển hướng đến trang chủ
        return redirect('/');
    }

    /*
    public function forget_password()
    {
        return view('Authetication::admin.forget_password');
    }
     
    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $admin_data = Admin::where('email', $request->email)->first();
        if(!$admin_data) {
            return redirect()->back()->with('error', __('Email address not found.'));
        }

        $token = hash('sha256', time());

        $admin_data->token = $token;
        $admin_data->update();

        $reset_link = url('admin/reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br>';
        $message .= '<a href="' . $reset_link . '">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('admin_login')->with('success', __('Please check your email and follow the steps there.'));
    }
    */
}