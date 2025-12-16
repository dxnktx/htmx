@extends('TripBooking::layout.app')

@section('heading', __('Dashboard'))

@section('main_content')
    <div class="row mb-3">
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <div>
                <h5>{{ __('Dashboard') }}</h5>
                <span>{{ __('See all the statistics at a glance') }}</span>
            </div>
        </div>
    </div>
        <!-- Counter boxes START -->
        <div class="row g-4">
            <!-- Counter item -->
            <div class="col-md-6 col-xxl-3">
                <div class="card card-body bg-warning bg-opacity-10 border border-warning border-opacity-25 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Digit -->
                        <div>
                            <h4 class="mb-0">{{ $trips_booking->count() }}</h4>
                            <span class="h6 fw-light mb-0">{{ __('Trip Booking') }}</span>
                        </div>
                        <!-- Icon -->
                        <div class="icon-lg rounded-circle bg-warning text-white mb-0"><i
                                class="fa-solid fa-hotel fa-fw"></i></div>
                    </div>
                </div>
            </div>

            <!-- Counter item -->
            <div class="col-md-6 col-xxl-3">
                <div class="card card-body bg-success bg-opacity-10 border border-success border-opacity-25 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Digit -->
                        <div>
                            <h4 class="mb-0">{{ $trips_approved->count() }}</h4>
                            <span class="h6 fw-light mb-0">{{ __('Approved') }}</span>
                        </div>
                        <!-- Icon -->
                        <div class="icon-lg rounded-circle bg-success text-white mb-0"><i
                                class="fa-solid fa-hand-holding-dollar fa-fw"></i></div>
                    </div>
                </div>
            </div>

            <!-- Counter item -->
            <div class="col-md-6 col-xxl-3">
                <div class="card card-body bg-primary bg-opacity-10 border border-primary border-opacity-25 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Digit -->
                        <div>
                            <h4 class="mb-0">{{ $trips_pending->count() }}</h4>
                            <span class="h6 fw-light mb-0">{{ __('Pending') }}</span>
                        </div>
                        <!-- Icon -->
                        <div class="icon-lg rounded-circle bg-primary text-white mb-0"><i class="fa-solid fa-bed fa-fw"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Counter item -->
            <div class="col-md-6 col-xxl-3">
                <div class="card card-body bg-danger bg-opacity-10 border border-danger border-opacity-25 p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Digit -->
                        <div>
                            <h4 class="mb-0">{{ $trips_rejected->count() }}</h4>
                            <span class="h6 fw-light mb-0">{{ __('Rejected') }}</span>
                        </div>
                        <!-- Icon -->
                        <div class="icon-lg rounded-circle bg-danger text-white mb-0"><i class="fa-solid fa-bed fa-fw"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter boxes END -->
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    
                    <div class="card-body">
    
                        <h1>{{ $chart1->options['chart_title'] }}</h1>
                        {!! $chart1->renderHtml() !!}
    
                    </div>
    
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    
                    <div class="card-body">
    
                        <h1>{{ $chart2->options['chart_title'] }}</h1>
                        {!! $chart2->renderHtml() !!}
    
                    </div>
    
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">                        
                    <div class="card-body">        
                        <h1>{{ $chart3->options['chart_title'] }}</h1>
                        {!! $chart3->renderHtml() !!}        
                    </div>        
                </div>
            </div>
        </div>

@endsection

@push('scripts')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
    {!! $chart2->renderJs() !!}
    {!! $chart3->renderJs() !!}

    <script>
        (() => {
            'use strict'

            // Graphs
            const ctx = document.getElementById('myChart')
            // eslint-disable-next-line no-unused-vars
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        'Sunday',
                        'Monday',
                        'Tuesday',
                        'Wednesday',
                        'Thursday',
                        'Friday',
                        'Saturday'
                    ],
                    datasets: [{
                        data: [
                            15339,
                            21345,
                            18483,
                            24003,
                            23489,
                            24092,
                            12034
                        ],
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        borderWidth: 4,
                        pointBackgroundColor: '#007bff'
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            boxPadding: 3
                        }
                    }
                }
            })
        })()
    </script>
@endpush
