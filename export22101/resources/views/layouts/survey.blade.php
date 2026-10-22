@extends('TripBooking::layout.guest')

@push('styles')
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        tet: {
                            red: '#b91c1c',
                            gold: '#ca8a04',
                            cream: '#fff7ed',
                        }
                    }
                }
            }
        }
    </script>
@endpush

@section('main_content')
    <main class="min-h-screen bg-gradient-to-b from-orange-50 via-red-50 to-amber-50 text-slate-800 antialiased">
        <div class="mx-auto max-w-4xl px-4 py-4 sm:px-6 sm:py-12">
            @yield('content')
        </div>
    </main>
@endsection
