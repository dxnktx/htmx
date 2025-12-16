<?php

namespace Modules\TripBooking\src\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Modules\TripBooking\src\Models\Trip;
use Modules\TripBooking\src\Models\Student;
use Modules\TripBooking\src\Repositories\Trip\TripRepositoryInterface;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    private $tripRepository;

    public function __construct(TripRepositoryInterface $tripRepository)
    {
        $this->tripRepository = $tripRepository;
    }

    public function index()
    {
        $trips_booking = Trip::all();
        $trips_pending = Trip::where('status', 0)->get();
        $trips_approved = Trip::where('status', 1)->get();
        $trips_rejected = Trip::where('status', 2)->get();

        $chart_options = [
            'chart_title' => __('Trip registers by dates'),
            'chart_type' => 'line',
            'report_type' => 'group_by_date',
            'model' => Trip::class,
        
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
        
            'aggregate_function' => 'count',
            'aggregate_field' => 'id',
            
            'filter_field' => 'created_at',
            'filter_days' => 30, // show only transactions for last 30 days
            'filter_period' => 'week', // show only transactions for this week
            'continuous_time' => true, // show continuous timeline including dates without data
        ];
        $chart1 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => __('Trip registers by stations'),
            'chart_type' => 'bar',
            'report_type' => 'group_by_string',
            'model' => Trip::class,
        
            'group_by_field' => 'tinh_thanh',
        
            'aggregate_function' => 'count',
            'aggregate_field' => 'tinh_thanh',
            
            'filter_field' => 'tinh_thanh',
            'filter_days' => 30, // show only transactions for last 30 days
            'filter_period' => 'week', // show only transactions for this week
        ];
        $chart2 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => __('Trip registers by units'),
            'chart_type' => 'pie',
            'report_type' => 'group_by_string',
            'model' => Student::class,
        
            'group_by_field' => 'don_vi_dao_tao',
        
            'aggregate_function' => 'count',
            'aggregate_field' => 'don_vi_dao_tao',
            
            'filter_field' => 'don_vi_dao_tao',
            'filter_days' => 30, // show only transactions for last 30 days
            'filter_period' => 'week', // show only transactions for this week
        ];
        $chart3 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => __('Trip registers by statuses'),
            'chart_type' => 'bar',
            'report_type' => 'group_by_string',
            'model' => Trip::class,
            'group_by_field' => 'status',
        ];
        $chart4 = new LaravelChart($chart_options);
        
        return view('TripBooking::dashboard.index', compact('trips_booking', 'trips_pending', 'trips_approved', 'trips_rejected', 'chart1', 'chart2', 'chart3', 'chart4'));
    }
}
