<div class="container text-center my-3">
    <h2 class="py-3 fw-bold text-uppercase">{{ __('tin tức mới nhất') }}</h2>
    <div class="row mx-auto my-auto justify-content-center">
        @if(isset($posts) && $posts->count() > 0)
            @foreach($posts as $item)
                <div class="col-md-4">
                    <div class="card mx-1">
                        <div class="card-img">
                            <a href="{{ route('tin_tuc_chi_tiet', $item->slug) }}" class="text-decoration-none"><img src="{{ asset('/storage/uploads/post/' . ($item->photo ?? '../default.png')) }}" class="img-thumbnail px-2 bg-danger"></a>
                        </div>             
                        <div class="card-body p-1">
                            <a href="{{ route('tin_tuc_chi_tiet', $item->slug) }}" class="text-decoration-none text-muted"><h5>{{ $item->heading }}</h5></a>
                            <span>{{ $item->short_description }}</span>
                        </div>             
                    </div>
                </div>
            @endforeach
        @else    
            <div class="alert alert-danger" role="alert">
                Hiện tại chưa có bài viết nào.
            </div>
        @endif
    </div>		
</div>