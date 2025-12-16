<?php

namespace Modules\TripBooking\src\Repositories\Partner;

use Modules\TripBooking\src\Models\Partner;
use Modules\TripBooking\src\Filters\PartnerFilter;
use Modules\TripBooking\src\Repositories\BaseRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PartnerRepository extends BaseRepository implements PartnerRepositoryInterface
{
    protected $model;

    public function __construct(Partner $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        try {
            DB::transaction(function () use ($request) {

                $obj = $this->model->where('id', $request->id)->firstOrNew();

                if($request->hasFile('image')) {

                    if(is_file(public_path('storage/uploads/partner/' . $obj->image))) {
                        unlink(public_path('storage/uploads/partner/' . $obj->image));
                    }

                    $ext = $request->file('image')->extension();
                    $final_name = 'partner_' . time() . '.' . $ext;

                    $request->file('image')->move(public_path('storage/uploads/partner/'), $final_name);

                    $obj->image = $final_name;
                }

                $obj->name = $request->name;
                $obj->link = $request->link;
                $obj->description = $request->description;
                $obj->save();

            });            
        } catch (\Exception $e) {
            
            Log::error('Update failed', ['exception' => $e->getMessage()]);
            return redirect()->route('partner_index')->with('warning', __('There is some error in partner step.'));
        }
    }
}