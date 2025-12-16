<?php

namespace Modules\TripBooking\src\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Activity;
use Modules\TripBooking\src\Repositories\Activity\ActivityRepositoryInterface;

class ActivityController extends Controller
{
    private $activityRepository;

    public function __construct(ActivityRepositoryInterface $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    public function index()
    {
        $datas = $this->activityRepository->all();
        return view('TripBooking::activity.index', compact('datas'));
    }

    public function destroy($id)
    {
        $this->activityRepository->delete($id);
        return redirect()->route('activity_index')->with('success', __('Data is deleted successfully.'));
    }
}
