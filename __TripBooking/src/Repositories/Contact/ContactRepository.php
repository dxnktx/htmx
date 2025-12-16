<?php

namespace Modules\TripBooking\src\Repositories\Contact;

use Modules\TripBooking\src\Models\Contact;
use Modules\TripBooking\src\Filters\ContactFilter;
use Modules\TripBooking\src\Repositories\BaseRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    protected $model;

    public function __construct(Contact $model)
    {
        parent::__construct($model);
    }

    public function update($request)
    {
        try {
            DB::transaction(function () use ($request) {

                $obj = $this->model->where('id', $request->id)->firstOrNew();

                if($request->hasFile('image')) {

                    if(is_file(public_path('storage/uploads/contact/' . $obj->image))) {
                        unlink(public_path('storage/uploads/contact/' . $obj->image));
                    }

                    $ext = $request->file('image')->extension();
                    $final_name = 'contact_' . time() . '.' . $ext;

                    $request->file('image')->move(public_path('storage/uploads/contact/'), $final_name);

                    $obj->image = $final_name;
                }

                $obj->name = $request->name;
                $obj->phone = $request->phone;
                $obj->email = $request->email;
                $obj->message = $request->message;
                $obj->status = empty($request->status) ? 'Chưa đọc' : $request->status;
                $obj->save();

            });            
        } catch (\Exception $e) {
            
            Log::error('Update failed', ['exception' => $e->getMessage()]);
            return redirect()->route('contact_index')->with('warning', __('There is some error in contact step.'));
        }
    }
}