<?php

namespace Modules\TripBooking\src\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Unit;
use Modules\TripBooking\src\Repositories\Unit\UnitRepositoryInterface;

class UnitController extends Controller
{
    private $unitRepository;

    public function __construct(UnitRepositoryInterface $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    public function index()
    {
        $datas = $this->unitRepository->all();
        return view('TripBooking::unit.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->unitRepository->delete($id);
        return redirect()->route('unit_index')->with('success', __('Data is deleted successfully.'));
    }
}
