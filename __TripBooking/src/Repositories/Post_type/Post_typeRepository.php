<?php

namespace Modules\TripBooking\src\Repositories\Post_type;

use Modules\TripBooking\src\Models\Post_type;
use Modules\TripBooking\src\Filters\Post_typeFilter;
use Modules\TripBooking\src\Repositories\BaseRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Post_typeRepository extends BaseRepository implements Post_typeRepositoryInterface
{
    protected $model;

    public function __construct(Post_type $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        $obj = $this->model->where('id', $request->id)->firstOrNew();

        if($request->hasFile('image')) {

            if(is_file(public_path('storage/uploads/post_type/' . $obj->image))) {
                unlink(public_path('storage/uploads/post_type/' . $obj->image));
            }

            $ext = $request->file('image')->extension();
            $final_name = 'post_type_' . time() . '.' . $ext;

            $request->file('image')->move(public_path('storage/uploads/post_type/'), $final_name);

            $obj->image = $final_name;
        }

        $obj->name = $request->name;
        $obj->save();
    }
}