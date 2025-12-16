<?php

namespace Modules\TripBooking\src\Repositories\Bank;

use Modules\TripBooking\src\Models\Bank;
use Modules\TripBooking\src\Filters\BankFilter;
use Modules\TripBooking\src\Repositories\BaseRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankRepository extends BaseRepository implements BankRepositoryInterface
{
    protected $model;

    public function __construct(Bank $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        $obj = $this->model->where('id', $request->id)->firstOrNew();

        if($request->hasFile('image')) {

            if(is_file(public_path('storage/uploads/bank/' . $obj->image))) {
                unlink(public_path('storage/uploads/bank/' . $obj->image));
            }

            $ext = $request->file('image')->extension();
            $final_name = 'bank_' . time() . '.' . $ext;

            $request->file('image')->move(public_path('storage/uploads/bank/'), $final_name);

            $obj->image = $final_name;
        }

        $obj->ma_ngan_hang = $request->ma_ngan_hang;
        $obj->ten_ngan_hang = $request->ten_ngan_hang;
        $obj->save();
    }
}