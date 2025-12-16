<?php

namespace Modules\TripBooking\src\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Unit\UpdateUnitRequest;
use Modules\TripBooking\src\Repositories\Unit\UnitRepositoryInterface;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdateUnitController extends Controller
{
    private $unitRepository;

    public function __construct(UnitRepositoryInterface $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->unitRepository->find($id);
        return view('TripBooking::unit.edit', compact('item'));
    }

    public function store(UpdateUnitRequest $request)
    {
        $this->unitRepository->update($request);
        return redirect()->route('unit_index')->with('success', __('Data is updated successfully.'));
    }
}
