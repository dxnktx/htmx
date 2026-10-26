@extends('layouts.survey')

@section('title', 'Cảm ơn bạn đã gửi khảo sát')

@section('content')
<div class="rounded-2xl bg-white px-6 py-12 text-center shadow-lg shadow-red-100 ring-1 ring-red-100 sm:px-10">
    <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-green-100 text-3xl text-green-600">✓</div>
    <h1 class="text-2xl font-bold text-green-800 sm:text-3xl">Cảm ơn bạn đã hoàn thành khảo sát</h1>
    <p class="mt-4 text-slate-600">
        Hệ thống đã ghi nhận nhu cầu của bạn. Thông tin này sẽ được dùng để lên kế hoạch hỗ trợ phù hợp.
    </p>
    <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:justify-center">
        <a href="{{ url('/') }}" class="rounded-xl border border-slate-300 px-5 py-3 font-semibold text-slate-700 hover:bg-slate-50">
            Về trang chủ
        </a>
    </div>
</div>
@endsection
