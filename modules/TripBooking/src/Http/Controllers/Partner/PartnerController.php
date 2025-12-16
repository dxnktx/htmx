<?php

namespace Modules\TripBooking\src\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Partner;
use Modules\TripBooking\src\Repositories\Partner\PartnerRepositoryInterface;

class PartnerController extends Controller
{
    private $partnerRepository;

    public function __construct(PartnerRepositoryInterface $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    public function index()
    {
        $datas = $this->partnerRepository->all();
        return view('TripBooking::partner.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->partnerRepository->delete($id);
        return redirect()->route('partner_index')->with('success', __('Data is deleted successfully.'));
    }
}
