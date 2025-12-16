<?php

namespace Modules\TripBooking\src\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Banner\UpdateBannerRequest;
use Modules\TripBooking\src\Repositories\Banner\BannerRepositoryInterface;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdateBannerController extends Controller
{
    private $bannerRepository;

    public function __construct(BannerRepositoryInterface $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->bannerRepository->find($id);
        return view('TripBooking::banner.edit', compact('item'));
    }

    public function store(UpdateBannerRequest $request)
    {
        $this->bannerRepository->update($request);
        return redirect()->route('banner_index')->with('success', __('Data is updated successfully.'));
    }
}
