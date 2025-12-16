<?php

namespace Modules\TripBooking\src\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Contact;
use Modules\TripBooking\src\Repositories\Contact\ContactRepositoryInterface;

class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        $datas = $this->contactRepository->all();
        return view('TripBooking::contact.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->contactRepository->delete($id);
        return redirect()->route('contact_index')->with('success', __('Data is deleted successfully.'));
    }
}
