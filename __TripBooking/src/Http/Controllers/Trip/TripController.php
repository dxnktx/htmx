<?php

namespace Modules\TripBooking\src\Http\Controllers\Trip;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Trip;
use Modules\TripBooking\src\Repositories\Trip\TripRepositoryInterface;

class TripController extends Controller
{
    private $tripRepository;

    public function __construct(TripRepositoryInterface $tripRepository)
    {
        $this->tripRepository = $tripRepository;
    }

    public function index()
    {
        $datas = Trip::with('rUser', 'rStudent')->orderBy('created_at', 'desc')->paginate(10);
        
        return view('TripBooking::trip.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->tripRepository->delete($id);
        return redirect()->route('trip_index')->with('success', __('Data is deleted successfully.'));
    }
    
    public function export() 
    {
        return $this->tripRepository->export();
    }

}
