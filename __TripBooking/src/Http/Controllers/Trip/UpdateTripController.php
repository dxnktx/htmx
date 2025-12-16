<?php

namespace Modules\TripBooking\src\Http\Controllers\Trip;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\TripBooking\src\Mail\Websitemail;
use Modules\TripBooking\src\Http\Requests\Trip\UpdateTripRequest;
use Modules\TripBooking\src\Repositories\Trip\TripRepositoryInterface;
use Modules\TripBooking\src\Repositories\Route\RouteRepositoryInterface;
use Modules\TripBooking\src\Repositories\Station\StationRepositoryInterface;
use Modules\TripBooking\src\Repositories\Unit\UnitRepositoryInterface;
use Modules\TripBooking\src\Repositories\Bank\BankRepositoryInterface;
use Modules\TripBooking\src\Models\Trip;
use Modules\Authetication\src\Models\User;
use Modules\TripBooking\src\Models\Route;
use Modules\TripBooking\src\Models\Station;
use Modules\TripBooking\src\Models\Student;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdateTripController extends Controller
{
    private $tripRepository;
    private $routeRepository;
    private $stationRepository;
    private $unitRepository;
    private $bankRepository;

    public function __construct(TripRepositoryInterface $tripRepository, RouteRepositoryInterface $routeRepository, StationRepositoryInterface $stationRepository, UnitRepositoryInterface $unitRepository, BankRepositoryInterface $bankRepository)
    {
        $this->tripRepository = $tripRepository;
        $this->routeRepository = $routeRepository;
        $this->stationRepository = $stationRepository;
        $this->unitRepository = $unitRepository;
        $this->bankRepository = $bankRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->tripRepository->find($id);
        $units = $this->unitRepository->get(99);
        $stations = $this->stationRepository->get(99);
        $banks = $this->bankRepository->get(99);

        // check lỗi id user
        $user = User::where('id', auth()->user()->id ?? '')->firstOrNew();
        $student = Student::where('ma_sinh_vien', auth()->user()->ma_sinh_vien ?? '')->firstOrNew();
        $trip = Trip::where('ma_sinh_vien', auth()->user()->ma_sinh_vien ?? '')->firstOrNew();

        return view('TripBooking::trip.edit', compact('item', 'units', 'stations', 'banks', 'user', 'student', 'trip'));
    }
 
    public function detail($mssv)
    {
        $trip = $this->tripRepository->findBy('ma_sinh_vien', $mssv);
        $user = User::where('ma_sinh_vien', $trip->ma_sinh_vien)->first();
        $student = Student::where('ma_sinh_vien', $trip->ma_sinh_vien)->first();
        
        return view('TripBooking::trip.detail', compact('trip', 'user', 'student'));
    }

    public function store(UpdateTripRequest $request)
    {
        $this->tripRepository->update($request);
        
        $subject = __('Thông báo đăng ký hành trình mùa xuân thành công.');
        $message = __('Cảm ơn bạn đã đăng ký chuyến đi hành trình mùa xuân. Mã đăng ký của bạn là: <a href="https://htmx.ktxhcm.edu.vn/trip/detail/' . $request->ma_sinh_vien . '" title="' . $request->ma_sinh_vien . '">' . $request->ma_sinh_vien . '</a>. Thông tin đăng ký của bạn:') . '<br>';  
        $message .= __('Tên của bạn: ') . $request->ho_va_ten . '<br>';
        $message .= __('Số điện thoại: ') . $request->so_dien_thoai . '<br>';
        $message .= __('Điểm đến: ') . $request->tinh_thanh . '<br>';
        $message .= __('Vui lòng tra cứu tình trạng xét duyệt theo mã sinh viên và theo dõi thêm thông tin trên trang chủ theo lịch trình chuyến đi nhé.');

        // Chưa cung cấp mã tra cứu cho student
        Mail::to($request->email)->send(new Websitemail($subject, $message));
                
        return redirect()->route('trip_detail', $request->ma_sinh_vien)->with('success', __('Thank you for your application, we are reviewing it and will get back to you as soon as possible.'));
    }

    public function reset($id)
    {
        $trip_single = $this->tripRepository->find($id);
        $trip_single->status = 0;
        $trip_single->update();
        
        return redirect()->back()->with('success', __('Data is updated successfully.'));
    }

    public function approve($id)
    {
        $trip_single = $this->tripRepository->find($id);
        $trip_single->status = 1;
        $trip_single->update();
        
        $subject = __('Kết quả đăng ký Chương Trình “Hành Trình Mùa Xuân” 2025.');
        $message = __('Chúc mừng bạn đã được duyệt tham gia chương trình “Hành Trình Mùa Xuân” 2025 – chương trình đưa sinh viên về quê đón Tết Ất Tỵ. Dưới đây là thông tin chi tiết:<br><br>');
        $message .= __('<strong>1. Sinh viên được duyệt về Phú Yên, Bình Định</strong><br><br>');
        $message .= __('Sinh viên được duyệt về 2 tỉnh Phú Yên, Bình Định sẽ tham gia trực tiếp chuyến xe do BTC điều phối vào sáng ngày 20/1/2025 tại KTX khu B.<br>');
        $message .= __('•	Tham gia nhóm Zalo để nhận thông tin chi tiết: <a href="https://zalo.me/g/awestu020">Nhóm Zalo</a><br><br>');
        $message .= __('<strong>2. Sinh viên được duyệt về các tỉnh thành còn lại</strong><br><br>');
        $message .= __('Sinh viên được duyệt hỗ trợ về các tỉnh thành còn lại trong chương trình (trừ Phú Yên, Bình Định) sẽ được hỗ trợ tặng vé bằng hiện kim.<br>');
        $message .= __('•	Tham gia nhóm Zalo để nhận thông tin chi tiết: <a href="https://zalo.me/g/utijvc940">Nhóm Zalo</a><br><br>');
        $message .= __('Xem danh sách kết quả <a href="https://docs.google.com/spreadsheets/d/1LImRCY9UQ20Yh7RnqGwaBYNHXyZxpfAJ/view">TẠI ĐÂY</a><br><br>');
        $message .= __('Mọi thắc mắc vui lòng liên hệ email: <a href="mailto:youth@vnuhcm.edu.vn">youth@vnuhcm.edu.vn</a>.<br>');
        $message .= __('Chúng tôi mong rằng chương trình sẽ mang lại cho bạn những khoảnh khắc ý nghĩa, gắn kết, và tràn đầy niềm vui trước thềm năm mới.<br>');

        Mail::to($trip_single->rUser->email)->send(new Websitemail($subject, $message));
                
        return redirect()->back()->with('success', __('Data is updated successfully.'));
    }

    public function reject($id)
    {
        $trip_single = $this->tripRepository->find($id);
        $trip_single->status = 2;
        $trip_single->update();
        
        $subject = __('Kết quả đăng ký Chương Trình “Hành Trình Mùa Xuân” 2025.');
        $message = __('Thân gửi <strong>' . $trip_single->ten_sinh_vien . '</strong>,<br><br>');
        $message .= __('Cảm ơn bạn đã quan tâm và đăng ký tham gia chương trình "Hành trình mùa xuân" đưa sinh viên về quê đón Tết Ất Tỵ 2025 do Đại học Quốc gia Thành phố Hồ Chí Minh tổ chức.<br>');
        $message .= __('Hiện tại, chúng tôi đã ghi nhận đăng ký của bạn và xin thông báo rằng bạn đang trong danh sách chờ duyệt đợt 2. Kết quả duyệt đợt 2 dự kiến sẽ được thông báo qua email vào ngày 15/01/2025.<br><br>');
        $message .= __('Nếu có nhu cầu vế quê đón Tết, BTC khuyến khích bạn nên chủ động mua vé xe trước trong thời gian chờ kết quả, BTC sẽ gửi thông tin hỗ trợ sau nếu bạn được duyệt.<br><br>');
        $message .= __('Nếu có bất kỳ thắc mắc nào, vui lòng liên hệ email: <a href="mailto:youth@vnuhcm.edu.vn">youth@vnuhcm.edu.vn</a>. Chúng tôi rất mong được đồng hành cùng bạn và hy vọng bạn sẽ có một hành trình đầy ý nghĩa để đón Tết cùng gia đình.<br><br>');

        Mail::to($trip_single->rUser->email)->send(new Websitemail($subject, $message));
                
        return redirect()->back()->with('success', __('Data is updated successfully.'));
    }
}
