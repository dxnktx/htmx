<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Khảo sát nhu cầu về quê ăn Tết')</title>
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
</head>
<body class="min-h-screen bg-gradient-to-b from-orange-50 via-red-50 to-amber-50 text-slate-800 antialiased">
    <div class="mx-auto max-w-3xl px-4 py-8 sm:px-6 sm:py-12">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>
