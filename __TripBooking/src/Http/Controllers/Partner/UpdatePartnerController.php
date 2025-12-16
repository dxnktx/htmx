<?php

namespace Modules\TripBooking\src\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Partner\UpdatePartnerRequest;
use Modules\TripBooking\src\Repositories\Partner\PartnerRepositoryInterface;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdatePartnerController extends Controller
{
    private $partnerRepository;

    public function __construct(PartnerRepositoryInterface $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->partnerRepository->find($id);
        return view('TripBooking::partner.edit', compact('item'));
    }

    public function store(UpdatePartnerRequest $request)
    {
        $this->partnerRepository->update($request);
        return redirect()->route('partner_index')->with('success', __('Data is updated successfully.'));
    }
}
