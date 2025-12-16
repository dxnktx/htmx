<?php

namespace Modules\TripBooking\src\Http\Controllers\Station;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Station;
use Modules\TripBooking\src\Repositories\Station\StationRepositoryInterface;

class StationController extends Controller
{
    private $stationRepository;

    public function __construct(StationRepositoryInterface $stationRepository)
    {
        $this->stationRepository = $stationRepository;
    }

    public function index()
    {
        $datas = $this->stationRepository->all();
        return view('TripBooking::station.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->stationRepository->delete($id);
        return redirect()->route('station_index')->with('success', __('Data is deleted successfully.'));
    }
}
