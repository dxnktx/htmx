<?php

namespace Modules\TripBooking\src\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Contact\UpdateContactRequest;
use Modules\TripBooking\src\Repositories\Contact\ContactRepositoryInterface;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdateContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->contactRepository->find($id);
        return view('TripBooking::contact.edit', compact('item'));
    }

    public function store(UpdateContactRequest $request)
    {
        $this->contactRepository->update($request);
        return redirect()->route('contact_index')->with('success', __('Data is updated successfully.'));
    }
}
