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

        $subject = __('Kết quả đăng ký Chương Trình “Hành Trình Mùa Xuân” - Xuân Bính Ngọ 2026.');
        $message = __('Chúc mừng đơn đăng ký Chương trình “Hành trình mùa xuân” – Xuân Bính Ngọ 2026 của bạn đã được xét duyệt thành công!<br><br>');
        $message .= __('Dưới đây là một số thông tin chính liên quan đến chương trình Lễ Khởi hành “Hành trình mùa xuân” – Xuân Bính Ngọ 2026:<br>');
        $message .= __('<strong>1. Thời gian tổ chức chương trình:</strong> 07 giờ 30 phút, Chủ nhật, ngày 08 tháng 02 năm 2026 (nhằm ngày 21 tháng Chạp năm Ất Tỵ).<br><br>');
        $message .= __('<strong>2. Địa điểm tổ chức chương trình: </strong>Quảng trường Cột mốc chủ quyền quần đảo Trường Sa – Ký túc xá Khu B ĐHQG-HCM, Khu phố Tân Hòa, Phường Đông Hòa, Thành phố Hồ Chí Minh.<br>');
        $message .= __('Sinh viên được xét duyệt thành công Chương trình “Hành trình mùa xuân” 2026 sẽ đi theo chuyến xe được chỉ định tại Lễ Khởi hành, đồng thời được nhận hỗ trợ vé lượt vào sau Tết theo kế hoạch của Ban Tổ chức. Thông tin cụ thể về hình thức hỗ trợ, thời gian và thủ tục nhận vé sẽ được Ban Tổ chức thông báo cụ thể đến sinh viên.<br>');
        $message .= __('Các thông tin chi tiết về thời gian tập trung, phương tiện di chuyển, lịch trình cụ thể, hỗ trợ vé lượt vào sau Tết và các lưu ý cần thiết sẽ được thông tin chi tiết tại: <a href="https://zalo.me/g/udvdbb941">nhóm Zalo</a>. Bạn vui lòng tham gia để đón nhận những thông tin mới nhất từ chương trình.<br>');
        $message .= __('Ban Tổ chức đề nghị sinh viên theo dõi thường xuyên và phối hợp thực hiện đúng hướng dẫn để chương trình được diễn ra an toàn, thuận lợi.<br><br>');
        $message .= __('Chúc bạn có một Hành trình mùa xuân 2026 ấm áp, ý nghĩa và nhiều niềm vui.<br><br>');
        $message .= __('Trân trọng,<br>');
        $message .= __('Ban Tổ chức Chương trình “Hành trình mùa xuân” – Xuân Bính Ngọ 2026.<br>');
        $message .= __('Email liên hệ: htmx@ktxhcm.edu.vn<br>');
        $message .= __('Website: htmx.ktxhcm.edu.vn <br>');

        Mail::to($trip_single->rUser->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', __('Data is updated successfully.'));
    }

    public function reject($id)
    {
        $trip_single = $this->tripRepository->find($id);
        $trip_single->status = 2;
        $trip_single->update();

        $subject = __('Kết quả đăng ký Chương trình “Hành trình mùa xuân” – Xuân Bính Ngọ 2026');
        $message = __('Kính gửi sinh viên <strong>' . $trip_single->ten_sinh_vien . '</strong>,<br><br>');
        $message .= __('Ban Tổ chức Chương trình “Hành trình mùa xuân” – Xuân Bính Ngọ 2026 xin chân thành cảm ơn sinh viên đã quan tâm và đăng ký tham gia chương trình.<br>');
        $message .= __('Sau quá trình tổng hợp và xét duyệt hồ sơ, Ban Tổ chức rất tiếc chưa thể xét duyệt đăng ký của bạn trong đợt này do chưa đạt tiêu chí theo yêu cầu.<br><br>');
        $message .= __('Ban Tổ chức ghi nhận tinh thần tham gia và mong rằng sẽ tiếp tục đón nhận sự quan tâm, đồng hành của sinh viên trong các chương trình khác trong tương lai.<br><br>');
        $message .= __('Kính chúc bạn sức khỏe, học tập tốt và đón một mùa xuân nhiều niềm vui, hạnh phúc.<br><br>');
        $message .= __('Trân trọng,<br>');
        $message .= __('Ban Tổ chức Chương trình “Hành trình mùa xuân” – Xuân Bính Ngọ 2026.<br>');
        $message .= __('Email liên hệ: htmx@ktxhcm.edu.vn<br>');
        $message .= __('Website: htmx.ktxhcm.edu.vn <br>');

        Mail::to($trip_single->rUser->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', __('Data is updated successfully.'));
    }
}
