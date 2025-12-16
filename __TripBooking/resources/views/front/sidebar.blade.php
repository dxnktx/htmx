<div class="col-md-4">
    <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-body-tertiary rounded">
            <h4 class="fst-italic">Chuyến xe mùa Xuân</h4>
            <p class="mb-0">Tổ chức các tuyến xe đưa học sinh, sinh viên, người lao động khó khăn về quê đón tết miễn phí. Xe du lịch chất lượng cao 45 chỗ ngồi, có điều hòa, mỗi người 1 ghế, không đón khách dọc đường.</p>
        </div>

        <div>
            <h4 class="fst-italic">Bài viết mới nhất</h4>
            <ul class="list-unstyled">
                @foreach ($categories as $item)
                    <li>
                        <a href="{{ route('category_detail') }}" class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top">
                            <img src="{{ asset('storage/uploads/category/' . ($item->image ?? '../default.png')) }}"
                                width="100%" height="96">
                            <div class="col-lg-8">
                                <h6 class="mb-0">{{ $item->name }}</h6>
                                <small class="text-body-secondary">{{ date('d/m/Y - h:i', strtotime($item->created_at)) }}</small>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
