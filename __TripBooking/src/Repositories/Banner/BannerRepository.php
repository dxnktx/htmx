<?php

namespace Modules\TripBooking\src\Repositories\Banner;

use Modules\TripBooking\src\Models\Banner;
use Modules\TripBooking\src\Filters\BannerFilter;
use Modules\TripBooking\src\Repositories\BaseRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BannerRepository extends BaseRepository implements BannerRepositoryInterface
{
    protected $model;

    public function __construct(Banner $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        try {
            DB::transaction(function () use ($request) {

                $obj = $this->model->where('id', $request->id)->firstOrNew();

                if($request->hasFile('image')) {

                    if(is_file(public_path('storage/uploads/banner/' . $obj->image))) {
                        unlink(public_path('storage/uploads/banner/' . $obj->image));
                    }

                    $ext = $request->file('image')->extension();
                    $final_name = 'banner_' . time() . '.' . $ext;

                    $request->file('image')->move(public_path('storage/uploads/banner/'), $final_name);

                    $obj->image = $final_name;
                }

                $obj->name = $request->name;
                $obj->link = $request->link;
                $obj->type = $request->type;
                $obj->save();

            });            
        } catch (\Exception $e) {
            
            Log::error('Update failed', ['exception' => $e->getMessage()]);
            return redirect()->route('banner_index')->with('warning', __('There is some error in banner step.'));
        }
    }
}