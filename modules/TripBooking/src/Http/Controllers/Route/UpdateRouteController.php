<?php

namespace Modules\TripBooking\src\Http\Controllers\Route;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Route\UpdateRouteRequest;
use Modules\TripBooking\src\Repositories\Route\RouteRepositoryInterface;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdateRouteController extends Controller
{
    private $routeRepository;

    public function __construct(RouteRepositoryInterface $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->routeRepository->find($id);
        return view('TripBooking::route.edit', compact('item'));
    }

    public function store(UpdateRouteRequest $request)
    {
        $this->routeRepository->update($request);
        return redirect()->route('route_index')->with('success', __('Data is updated successfully.'));
    }
}
