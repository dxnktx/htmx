<?php

namespace Modules\TripBooking\src\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Bank\UpdateBankRequest;
use Modules\TripBooking\src\Repositories\Bank\BankRepositoryInterface;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdateBankController extends Controller
{
    private $bankRepository;

    public function __construct(BankRepositoryInterface $bankRepository)
    {
        $this->bankRepository = $bankRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->bankRepository->find($id);
        return view('TripBooking::bank.edit', compact('item'));
    }

    public function store(UpdateBankRequest $request)
    {
        $this->bankRepository->update($request);
        return redirect()->route('bank_index')->with('success', __('Data is updated successfully.'));
    }
}
