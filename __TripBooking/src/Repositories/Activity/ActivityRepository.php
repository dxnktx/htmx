<?php

namespace Modules\TripBooking\src\Repositories\Activity;

use Modules\TripBooking\src\Models\Activity;
use Modules\TripBooking\src\Filters\ActivityFilter;
use Modules\TripBooking\src\Repositories\BaseRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ActivityRepository extends BaseRepository implements ActivityRepositoryInterface
{
    protected $model;

    public function __construct(Activity $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        try {
            DB::transaction(function () use ($request) {

                $obj = $this->model->where('id', $request->id)->firstOrNew();

                if($request->hasFile('photo')) {

                    if(is_file(public_path('storage/uploads/activity/' . $obj->photo))) {
                        unlink(public_path('storage/uploads/activity/' . $obj->photo));
                    }

                    $ext = $request->file('photo')->extension();
                    $final_name = 'activity_' . time() . '.' . $ext;

                    $request->file('photo')->move(public_path('storage/uploads/activity/'), $final_name);

                    $obj->photo = $final_name;
                }

                $obj->heading = $request->heading;
                $obj->slug = empty($request->slug) ? Str::slug($request->heading, '-') : $request->slug;
                $obj->short_description = empty($request->short_description) ? '' : $request->short_description;
                $obj->description = empty($request->description) ? '1' : $request->description;
                $obj->total_view = empty($request->total_view) ? 0 : $request->total_view;
                $obj->save();

            });            
        } catch (\Exception $e) {
            
            Log::error('Update failed', ['exception' => $e->getMessage()]);
            return redirect()->route('activity_index')->with('warning', __('There is some error in activity step.'));
        }
    }
}