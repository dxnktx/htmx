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
                <label for="unit_id" class="form-label">Đơn vị đào tạo</label>
                <select id="unit_id" name="unit_id" class="form-select">
                    <option value="">Tất cả</option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}" @selected((string) ($filters['unit_id'] ?? '') === (string) $unit->id)>
                            {{ $unit->name }}
                        </option>
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
            <button
                class="btn btn-outline-primary"
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#survey-charts-modal"
            >
                Xem biểu đồ thống kê
            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="survey-charts-modal" tabindex="-1" aria-labelledby="survey-charts-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="survey-charts-modal-title">Thống kê &amp; Phân tích dữ liệu khảo sát</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card border-primary-subtle bg-primary-subtle mb-4">
                    <div class="card-body d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div>
                            <h6 class="mb-1">Tổng lượt đăng ký</h6>
                            <span class="text-muted small">Theo bộ lọc hiện tại</span>
                        </div>
                        <div class="fs-2 fw-bold text-primary">{{ number_format($chartData['totalRegistrations']) }}</div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-12 col-lg-6">
                        <div class="border rounded p-3 h-100">
                            <h6 class="mb-3">Tỷ lệ đăng ký theo đơn vị đào tạo</h6>
                            <div style="height: 300px; position: relative;">
                                <canvas id="survey-universities-chart" aria-label="Biểu đồ tỷ lệ theo đơn vị đào tạo" role="img"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="border rounded p-3 h-100">
                            <h6 class="mb-3">Số lượng đăng ký theo tỉnh thành</h6>
                            <div style="height: 300px; position: relative;">
                                <canvas id="survey-provinces-chart" aria-label="Biểu đồ số lượng theo tỉnh thành" role="img"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="border rounded p-3 h-100">
                            <h6 class="mb-3">Tỷ lệ theo hình thức hỗ trợ</h6>
                            <div style="height: 300px; position: relative;">
                                <canvas id="survey-support-types-chart" aria-label="Biểu đồ hình thức hỗ trợ" role="img"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="border rounded p-3 h-100">
                            <h6 class="mb-3">Phân bố theo khung thời gian khởi hành</h6>
                            <div style="height: 300px; position: relative;">
                                <canvas id="survey-departure-times-chart" aria-label="Biểu đồ thời gian khởi hành" role="img"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
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
                            <td>{{ $item->display_university }}</td>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    (function () {
        const modal = document.getElementById('survey-charts-modal');
        const chartData = @json($chartData);
        const charts = [];
        let chartsInitialized = false;
        const palette = ['#547c91', '#87a8a4', '#d6b779', '#a98278', '#8491a5', '#a7b7a1', '#c9a1a1'];

        function createChart(canvasId, data, type, horizontal) {
            const canvas = document.getElementById(canvasId);
            if (!canvas || data.labels.length === 0) {
                return;
            }

            charts.push(new Chart(canvas, {
                type: type,
                data: {
                    labels: data.labels,
                    datasets: [{
                        data: data.values,
                        backgroundColor: type === 'doughnut'
                            ? data.labels.map(function (_, index) { return palette[index % palette.length]; })
                            : '#7896a5',
                        borderColor: type === 'doughnut' ? '#ffffff' : '#648393',
                        borderWidth: type === 'doughnut' ? 2 : 1,
                        borderRadius: type === 'bar' ? 4 : 0,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: horizontal ? 'y' : 'x',
                    plugins: {
                        legend: {
                            display: type === 'doughnut',
                            position: 'bottom',
                        },
                    },
                    scales: type === 'bar' ? {
                        x: { beginAtZero: true, ticks: { precision: 0 } },
                        y: { ticks: { autoSkip: false } },
                    } : {},
                },
            }));
        }

        function initializeCharts() {
            createChart('survey-universities-chart', chartData.universities, 'doughnut', false);
            createChart('survey-provinces-chart', chartData.provinces, 'bar', false);
            createChart('survey-support-types-chart', chartData.supportTypes, 'doughnut', false);
            createChart('survey-departure-times-chart', chartData.departureTimes, 'bar', true);
        }

        modal.addEventListener('shown.bs.modal', function () {
            if (!chartsInitialized) {
                initializeCharts();
                chartsInitialized = true;
                return;
            }

            charts.forEach(function (chart) {
                chart.resize();
            });
        });
    })();
</script>
@endpush
