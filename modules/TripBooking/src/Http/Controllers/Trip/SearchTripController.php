<?php

namespace Modules\TripBooking\src\Http\Controllers\Trip;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Trip\SearchTripRequest;
use Modules\TripBooking\src\Repositories\Trip\TripRepositoryInterface;

class SearchTripController extends Controller
{
    private $tripRepository;

    public function __construct(TripRepositoryInterface $tripRepository)
    {
        $this->tripRepository = $tripRepository;
    }

    public function create(SearchTripRequest $request)
    {
        $datas = $this->tripRepository->search($request);
        return view('TripBooking::trip.index', compact('datas'));
    }
}
