<?php

namespace Modules\TripBooking\src\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Banner;
use Modules\TripBooking\src\Repositories\Banner\BannerRepositoryInterface;

class BannerController extends Controller
{
    private $bannerRepository;

    public function __construct(BannerRepositoryInterface $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    public function index()
    {
        $datas = $this->bannerRepository->all();
        return view('TripBooking::banner.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->bannerRepository->delete($id);
        return redirect()->route('banner_index')->with('success', __('Data is deleted successfully.'));
    }
}
