<?php

namespace Modules\TripBooking\src\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Gallery\UpdateGalleryRequest;
use Modules\TripBooking\src\Repositories\Gallery\GalleryRepositoryInterface;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdateGalleryController extends Controller
{
    private $galleryRepository;

    public function __construct(GalleryRepositoryInterface $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->galleryRepository->find($id);
        return view('TripBooking::gallery.edit', compact('item'));
    }

    public function store(UpdateGalleryRequest $request)
    {
        $this->galleryRepository->update($request);
        return redirect()->route('gallery_index')->with('success', __('Data is updated successfully.'));
    }
}
