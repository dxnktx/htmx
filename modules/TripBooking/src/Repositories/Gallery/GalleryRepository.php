<?php

namespace Modules\TripBooking\src\Repositories\Gallery;

use Modules\TripBooking\src\Models\Gallery;
use Modules\TripBooking\src\Filters\GalleryFilter;
use Modules\TripBooking\src\Repositories\BaseRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GalleryRepository extends BaseRepository implements GalleryRepositoryInterface
{
    protected $model;

    public function __construct(Gallery $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        try {
            DB::transaction(function () use ($request) {

                $image_get = $request->image;                
                foreach ($image_get as $image) {
                    $filename = $image->getClientOriginalName();
                    $fileNewName = time() . '_' . $filename;
                    $image->storeAs('uploads/gallery', $fileNewName, 'public'); //public/storage/images
                    $this->model->create([
                        'album' => $request->album,
                        'image' => $fileNewName,
                    ]);
                }
            });            
        } catch (\Exception $e) {            
            Log::error('Update failed', ['exception' => $e->getMessage()]);
            return redirect()->route('gallery_index')->with('warning', __('There is some error in gallery step.'));
        }
    }
}