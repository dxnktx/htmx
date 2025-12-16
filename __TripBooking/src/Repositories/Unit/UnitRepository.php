<?php

namespace Modules\TripBooking\src\Repositories\Unit;

use Modules\TripBooking\src\Models\Unit;
use Modules\TripBooking\src\Filters\UnitFilter;
use Modules\TripBooking\src\Repositories\BaseRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitRepository extends BaseRepository implements UnitRepositoryInterface
{
    protected $model;

    public function __construct(Unit $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        $obj = $this->model->where('id', $request->id)->firstOrNew();

        if($request->hasFile('image')) {

            if(is_file(public_path('storage/uploads/unit/' . $obj->image))) {
                unlink(public_path('storage/uploads/unit/' . $obj->image));
            }

            $ext = $request->file('image')->extension();
            $final_name = 'unit_' . time() . '.' . $ext;

            $request->file('image')->move(public_path('storage/uploads/unit/'), $final_name);

            $obj->image = $final_name;
        }

        $obj->ten_don_vi = $request->ten_don_vi;
        $obj->save();
    }
}