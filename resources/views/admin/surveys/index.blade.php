@extends('JangKeyte::layout.app')

@section('heading', 'Khảo sát về quê ăn Tết')

@section('main_content')
<div class="row mb-3">
    <div class="alert alert-primary d-flex align-items-center" role="alert">
        <div>
            <h5 class="mb-1">Danh sách khảo sát nhu cầu về quê ăn Tết</h5>
            <span>Lọc theo đơn vị đào tạo, tỉnh thành hoặc tìm theo họ tên, sau đó xuất báo cáo Excel.</span>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <form action="{{ route('admin.surveys.index') }}" method="GET" class="row g-3 align-items-end">
            <div class="col-12 col-md-4">
                <label for="q" class="form-label">Họ và tên</label>
                <input type="search" id="q" name="q" value="{{ $filters['q'] ?? '' }}" class="form-control" placeholder="Tìm theo họ và tên">
            </div>
            <div class="col-12 col-md-3">
                <label for="training_unit" class="form-label">Đơn vị đào tạo</label>
                <select id="training_unit" name="training_unit" class="form-select">
                    <option value="">Tất cả</option>
                    @foreach ($trainingUnits as $value => $label)
                        <option value="{{ $value }}" @selected(($filters['training_unit'] ?? '') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-3">
                <label for="destination_province" class="form-label">Tỉnh thành</label>
                <select id="destination_province" name="destination_province" class="form-select">
                    <option value="">Tất cả</option>
                    @foreach ($provinces as $value => $label)
                        <option value="{{ $value }}" @selected(($filters['destination_province'] ?? '') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-2 d-grid gap-2">
                <button type="submit" class="btn btn-primary">Lọc</button>
            </div>
        </form>
        <div class="mt-3 d-flex flex-wrap gap-2">
            <a href="{{ route('admin.surveys.index') }}" class="btn btn-outline-secondary">Xóa bộ lọc</a>
            <a href="{{ route('admin.surveys.export', request()->query()) }}" class="btn btn-success">Xuất Excel</a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Họ và tên</th>
                        <th>Đơn vị đào tạo</th>
                        <th>Năm</th>
                        <th>Chỗ ở</th>
                        <th>Hoàn cảnh</th>
                        <th>Tỉnh thành</th>
                        <th>Khởi hành</th>
                        <th>Hỗ trợ</th>
                        <th>Thời gian gửi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($surveys as $item)
                        <tr>
                            <td>{{ $surveys->firstItem() + $loop->index }}</td>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->training_unit_label }}</td>
                            <td>{{ $item->student_year_label }}</td>
                            <td>{{ $item->current_residence }}</td>
                            <td>{{ $item->family_situation_label }}</td>
                            <td>{{ $item->destination_province_label }}</td>
                            <td>{{ $item->departure_time_label }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($item->support_type_label, 40) }}</td>
                            <td>{{ optional($item->created_at)->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted py-4">Chưa có lượt khảo sát nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="jk-paginator mb-3">
            {!! $surveys->links() !!}
        </div>
    </div>
</div>
@endsection
