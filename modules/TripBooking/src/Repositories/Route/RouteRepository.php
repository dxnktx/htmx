<?php

namespace Modules\TripBooking\src\Repositories\Route;

use Modules\TripBooking\src\Models\Route;
use Modules\TripBooking\src\Filters\RouteFilter;
use Modules\TripBooking\src\Repositories\BaseRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteRepository extends BaseRepository implements RouteRepositoryInterface
{
    protected $model;

    public function __construct(Route $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        $obj = $this->model->where('id', $request->id)->firstOrNew();

        if($request->hasFile('image')) {

            if(is_file(public_path('storage/uploads/route/' . $obj->image))) {
                unlink(public_path('storage/uploads/route/' . $obj->image));
            }

            $ext = $request->file('image')->extension();
            $final_name = 'route_' . time() . '.' . $ext;

            $request->file('image')->move(public_path('storage/uploads/route/'), $final_name);

            $obj->image = $final_name;
        }

        $obj->ma_tuyen_duong = $request->ma_tuyen_duong;
        $obj->ten_tuyen_duong = $request->ten_tuyen_duong;
        $obj->khu_vuc = $request->khu_vuc;
        $obj->save();
    }
}