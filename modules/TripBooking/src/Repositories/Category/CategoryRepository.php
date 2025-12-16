<?php

namespace Modules\TripBooking\src\Repositories\Category;

use Modules\TripBooking\src\Models\Category;
use Modules\TripBooking\src\Filters\CategoryFilter;
use Modules\TripBooking\src\Repositories\BaseRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected $model;

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        try {
            DB::transaction(function () use ($request) {

                $obj = $this->model->where('id', $request->id)->firstOrNew();

                if($request->hasFile('image')) {

                    if(is_file(public_path('storage/uploads/category/' . $obj->image))) {
                        unlink(public_path('storage/uploads/category/' . $obj->image));
                    }

                    $ext = $request->file('image')->extension();
                    $final_name = 'category_' . time() . '.' . $ext;

                    $request->file('image')->move(public_path('storage/uploads/category/'), $final_name);

                    $obj->image = $final_name;
                }

                $obj->name = $request->name;
                $obj->slug = $request->slug;
                $obj->save();

            });            
        } catch (\Exception $e) {
            
            Log::error('Update failed', ['exception' => $e->getMessage()]);
            return redirect()->route('category_index')->with('warning', __('There is some error in category step.'));
        }
    }
}