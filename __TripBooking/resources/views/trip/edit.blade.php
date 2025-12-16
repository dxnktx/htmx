@extends('TripBooking::layout.guest')

@section('heading', __('Edit Trip'))

@section('button')
    <a href="{{ route('trip_index') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-folder-check"></i>
        {{ __('View All') }}</a>
@endsection

@section('main_content')
    @if((strtotime(now()) <= ENV('COUNTDOWN_END')) || auth()->check())
    <div class="container mt-5">
        <h2 class="text-center mb-4">{{ __('Đăng ký hành trình') }}</h2>
        @if(!auth()->check())
        <p class="text-center">{{ __('Nếu bạn là sinh viên nội trú, vui lòng đăng nhập') }} <a href="{{ route('login') }}">{{ __('tại đây') }}</a> </p>
        @endif
        @isset($trip->ma_sinh_vien)
        <p class="text-center">{{ __('Bạn đã đăng ký chuyến đi này rồi. Vui lòng xem thông tin chi tiết') }} <a href="{{ route('trip_detail', $trip->ma_sinh_vien) }}">{{ __('tại đây') }}</a></p>
        <p class="text-center">{{ __('Hoặc có thể cập nhật lại thông tin đã đăng ký theo form dưới đây.') }}</p>
        @endisset
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 75%"></div>
                </div>
                <form id="multiStepForm" method="POST" action="{{ route('trip_create') }}" enctype="multipart/form-data">
                    <!-- Step 1 -->
                    <div class="form-step active">
                        @include('TripBooking::trip.partials.profile-info')
                        <button type="button" class="btn btn-primary next-step">{{ __('Next') }}</button>
                    </div>

                    <!-- Step 2 -->
                    <div class="form-step">
                        @include('TripBooking::trip.partials.student-info')
                        <button type="button" class="btn btn-secondary prev-step">{{ __('Previous') }}</button>
                        <button type="button" class="btn btn-primary next-step">{{ __('Next') }}</button>
                    </div>

                    <!-- Step 3 -->
                    <div class="form-step">
                        @include('TripBooking::trip.partials.trip-info')
                        <button type="button" class="btn btn-secondary prev-step">{{ __('Previous') }}</button>
                        <button type="button" class="btn btn-primary next-step">{{ __('Next') }}</button>
                    </div>

                    <!-- Step 4 -->
                    <div class="form-step">
                        @include('TripBooking::trip.partials.bank-info')
                        <button type="button" class="btn btn-secondary prev-step">{{ __('Previous') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const steps = document.querySelectorAll(".form-step");
            const nextBtns = document.querySelectorAll(".next-step");
            const prevBtns = document.querySelectorAll(".prev-step");
            const progressBar = document.querySelector(".progress-bar");

            let currentStep = 0;

            // Initialize dataLayer if not already initialized
            window.dataLayer = window.dataLayer || [];

            // Function to update progress bar
            function updateProgressBar() {
                const progress = ((currentStep + 1) / steps.length) * 100;
                progressBar.style.width = `${progress}%`;
                progressBar.setAttribute("aria-valuenow", progress);
            }

            // Function to show the current step and send dataLayer event
            function showCurrentStep() {
                steps.forEach((step, index) => {
                    if (index === currentStep) {
                        step.classList.add("active");
                    } else {
                        step.classList.remove("active");
                    }
                });

                // Fire dataLayer event for each step
                window.dataLayer.push({
                    'event': `form_step_${currentStep + 1}`
                });

                updateProgressBar();
            }

            // Initialize first step visibility
            showCurrentStep();

            // Next button event listeners
            nextBtns.forEach((button) => {
                button.addEventListener("click", () => {
                    const currentInputs = steps[currentStep].querySelectorAll("input, select");
                    let valid = true;

                    // Validate the current inputs
                    currentInputs.forEach((input) => {
                        if (!input.checkValidity()) {
                            input.classList.add("is-invalid");
                            valid = false;
                        } else {
                            input.classList.remove("is-invalid");
                            input.classList.add("is-valid");
                        }
                    });

                    if (valid) {
                        steps[currentStep].classList.remove("active");
                        currentStep++;

                        // Populate review fields if on the final step
                        /*
              if (currentStep === steps.length - 1) {
                document.getElementById('reviewFirstName').textContent = document.getElementById('firstName').value;
                document.getElementById('reviewLastName').textContent = document.getElementById('lastName').value;
                document.getElementById('reviewEmail').textContent = document.getElementById('businessEmail').value || document.getElementById('email').value;
              }
            */

                        showCurrentStep();
                    }
                });
            });

            // Previous button event listeners
            prevBtns.forEach((button) => {
                button.addEventListener("click", () => {
                    currentStep--;
                    showCurrentStep();
                });
            });

            /*
            // Add event listener for form submission to fire the generate_lead event
            document.getElementById("multiStepForm").addEventListener("submit", function(e) {
                e.preventDefault(); // Prevent the default form submission for this example

                // Fire generate_lead event in the dataLayer
                window.dataLayer.push({
                    'event': 'generate_lead'
                });

                // Continue with form submission logic or AJAX call, if needed
                // Example: alert('Form submitted successfully!');

                // Gather form data
                const formData = new FormData(document.getElementById("multiStepForm"));

                // Send form data via AJAX (using Fetch API)
                fetch('/trip/create', {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => {
                        if (response.ok) {
                            // Handle success, such as displaying a success message or redirecting
                            alert('Form submitted successfully!');
                        } else {
                            // Handle errors
                            alert('There was a problem submitting the form.');
                        }
                    })
                    .catch(error => {
                        // Handle network errors or unexpected issues
                        alert('An error occurred. Please try again.');
                    });
            });
            */
            function myFunction() {
                var x = document.getElementById("ho_va_ten").value;
                document.getElementById("ten_tai_khoan").value = x;
            }
        </script>
    @endpush

    @push('styles')
        <style>
            .form-step {
                display: none;
                opacity: 0;
                transition: opacity 0.5s ease-in-out;
            }

            .form-step.active {
                display: block;
                opacity: 1;
                transition: opacity 0.5s ease-in-out;
            }

            .progress-bar {
                transition: width 0.5s ease-in-out;
            }
        </style>
    @endpush
    @else
    <div class="container text-center">
        <div class="alert alert-danger">
            <h4>Đã hết hạn đăng ký, vui lòng liên hệ với bộ phận hỗ trợ để được hướng dẫn.</h4>
        </div>
    </div>
    @endif
@endsection