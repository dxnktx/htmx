@extends('TripBooking::layout.app')

@section('heading', __('Students'))

@section('button')
    <a href="{{ route('student_export') }}" class="btn btn-primary btn-sm ms-2"><i class="bi bi-cloud-download"></i> {{ __('Export') }}</a>
@endsection

@section('main_content')
    <div class="row mb-3">
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <div>
                <h5>{{ __('Students') }}</h5>
                <span>{{ __('Below is a list of all students. You can add and edit students, change their status and see all infomation for each student.') }}</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Mã sinh viên') }}</th>
                                    <th>{{ __('Tên sinh viên') }}</th>
                                    <th>{{ __('Đơn vị đào tạo') }}</th>
                                    <th>{{ __('Khoa/Bộ môn') }}</th>
                                    <th>{{ __('Sinh viên năm thứ') }}</th>
                                    <th>{{ __('Điểm trung bình') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration + (($_GET['page'] ?? 1) - 1) * 10 }}
                                    </td>
                                    <td>{{ $item->ma_sinh_vien }}</td>
                                    <td>{{ $item->ten_sinh_vien }}</td>
                                    <td>{{ $item->don_vi_dao_tao }}</td>
                                    <td>{{ $item->khoa_bo_mon }}</td>
                                    <td>{{ $item->sinh_vien_nam_thu }}</td>
                                    <td>{{ $item->diem_trung_binh }}</td>
                                    <td class="py-1">
                                        <a href="{{ route('trip_detail', $item->ma_sinh_vien) }}" class="btn btn-primary btn-sm">{{ __('View') }}</a>
                                        <a href="{{ route('student_delete', $item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ __('Are you sure?') }}');">{{ __('Delete') }}</a>
                                        <!--
                                        <a href="{{ route('student_edit', $item->id) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                                        -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="jk-paginator mb-3">
                            {!! $datas->appends($_GET)->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection