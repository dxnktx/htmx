<?php

namespace Modules\TripBooking\src\Http\Controllers\Route;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Route;
use Modules\TripBooking\src\Repositories\Route\RouteRepositoryInterface;

class RouteController extends Controller
{
    private $routeRepository;

    public function __construct(RouteRepositoryInterface $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }

    public function index()
    {
        $datas = $this->routeRepository->all();
        return view('TripBooking::route.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->routeRepository->delete($id);
        return redirect()->route('route_index')->with('success', __('Data is deleted successfully.'));
    }
}
