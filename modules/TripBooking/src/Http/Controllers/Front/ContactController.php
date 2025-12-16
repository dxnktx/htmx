<?php

namespace Modules\TripBooking\src\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Modules\TripBooking\src\Mail\Websitemail;
use Modules\TripBooking\src\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Contact\UpdateContactRequest;
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
        return view('TripBooking::front.contact', compact('contact_page_item'));
    }

    public function submit(UpdateContactRequest $request)
    {
        $subject = __('Contact Form Message');
        $message = __('Visitor Information:') . '<br>';
        $message .= __('Name:') . $request->name . '<br>';
        $message .= __('Phone:') . $request->phone . '<br>';
        $message .= __('Email:') . $request->email . '<br>';
        $message .= __('Message:') . $request->message;

        Mail::to($request->email)->send(new Websitemail($subject, $message));
                
        $this->contactRepository->update($request);

        return redirect()->back()->with('success', __('Email is sent successfully. We will contact you soon.') );
    }
}
