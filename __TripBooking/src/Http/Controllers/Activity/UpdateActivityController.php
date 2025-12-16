<?php

namespace Modules\TripBooking\src\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Http\Requests\Activity\UpdateActivityRequest;
use Modules\TripBooking\src\Repositories\Activity\ActivityRepositoryInterface;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UpdateActivityController extends Controller
{
    private $activityRepository;

    public function __construct(ActivityRepositoryInterface $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }
    
    public function create($id = null)
    {
        $item = $this->activityRepository->find($id);
        return view('TripBooking::activity.edit', compact('item'));
    }

    public function store(UpdateActivityRequest $request)
    {
        $this->activityRepository->update($request);
        return redirect()->route('activity_index')->with('success', __('Data is updated successfully.'));
    }
}
