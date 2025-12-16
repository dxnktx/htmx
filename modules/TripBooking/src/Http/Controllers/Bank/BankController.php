<?php

namespace Modules\TripBooking\src\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Bank;
use Modules\TripBooking\src\Repositories\Bank\BankRepositoryInterface;

class BankController extends Controller
{
    private $bankRepository;

    public function __construct(BankRepositoryInterface $bankRepository)
    {
        $this->bankRepository = $bankRepository;
    }

    public function index()
    {
        $datas = $this->bankRepository->all();
        return view('TripBooking::bank.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->bankRepository->delete($id);
        return redirect()->route('bank_index')->with('success', __('Data is deleted successfully.'));
    }
}
