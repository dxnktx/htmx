@extends('layouts.survey')

@section('title', 'Khảo sát đã tồn tại')

@section('content')
<div class="rounded-2xl bg-white px-6 py-12 text-center shadow-lg shadow-red-100 ring-1 ring-red-100 sm:px-10">
    <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-red-100 text-3xl text-red-600">!</div>
    <h1 class="text-2xl font-bold text-red-800 sm:text-3xl">Khảo sát đã tồn tại.</h1>
    <p class="mt-4 text-red-600">
        Hệ thống ghi nhận bạn đã hoàn thành khảo sát trước đó. Xin cảm ơn bạn đã tham gia.
    </p>
</div>
@endsection
