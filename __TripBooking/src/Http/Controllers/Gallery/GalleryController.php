<?php

namespace Modules\TripBooking\src\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Gallery;
use Modules\TripBooking\src\Repositories\Gallery\GalleryRepositoryInterface;

class GalleryController extends Controller
{
    private $galleryRepository;

    public function __construct(GalleryRepositoryInterface $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    public function index()
    {
        $datas = $this->galleryRepository->all();
        return view('TripBooking::gallery.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->galleryRepository->delete($id);
        return redirect()->route('gallery_index')->with('success', __('Data is deleted successfully.'));
    }
}
