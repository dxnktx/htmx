<?php

namespace Modules\TripBooking\src\Http\Controllers\Station;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Station\UpdateStationRequest;
use Modules\TripBooking\src\Repositories\Station\StationRepositoryInterface;
use Modules\TripBooking\src\Repositories\Route\RouteRepositoryInterface;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdateStationController extends Controller
{
    private $stationRepository;
    private $routeRepository;

    public function __construct(StationRepositoryInterface $stationRepository, RouteRepositoryInterface $routeRepository)
    {
        $this->stationRepository = $stationRepository;
        $this->routeRepository = $routeRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->stationRepository->find($id);
        $routes = $this->routeRepository->all();
        return view('TripBooking::station.edit', compact('item', 'routes'));
    }

    public function store(UpdateStationRequest $request)
    {
        $this->stationRepository->update($request);
        return redirect()->route('station_index')->with('success', __('Data is updated successfully.'));
    }
}
