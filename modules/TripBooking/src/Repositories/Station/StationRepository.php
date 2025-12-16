<?php

namespace Modules\TripBooking\src\Repositories\Station;

use Modules\TripBooking\src\Models\Station;
use Modules\TripBooking\src\Filters\StationFilter;
use Modules\TripBooking\src\Repositories\BaseRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StationRepository extends BaseRepository implements StationRepositoryInterface
{
    protected $model;

    public function __construct(Station $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        $obj = $this->model->where('id', $request->id)->firstOrNew();
        $obj->tinh_thanh = $request->tinh_thanh;
        $obj->save();
    }
}