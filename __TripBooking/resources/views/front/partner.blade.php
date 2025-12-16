@isset($partners)
<div class="container text-center my-3">
    <h2 class="py-3 fw-bold text-uppercase">TRÂN TRỌNG CẢM ƠN CÁC ĐƠN VỊ ĐÃ THAM GIA HỖ TRỢ KINH PHÍ CHO CHƯƠNG TRÌNH NĂM 2025</h2>
    <div class="row mx-auto my-auto justify-content-center">
        <div id="partnerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach($partners as $item)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ asset('/storage/uploads/partner/' . ($item->image ?? '../default.png')) }}" class="img-thumbnail px-2 bg-danger">
                            </div>
                            <div class="card-img-overlay">{{ $item->name }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev bg-transparent w-aut" href="#partnerCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next bg-transparent w-aut" href="#partnerCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>		
</div>

@push('styles')
<style>
@media (max-width: 767px) {
    .carousel-inner .carousel-item > div {
        display: none;
    }
    .carousel-inner .carousel-item > div:first-child {
        display: block;
    }
}

.carousel-inner .carousel-item.active,
.carousel-inner .carousel-item-next,
.carousel-inner .carousel-item-prev {
    display: flex;
}

/* medium and up screens */
@media (min-width: 768px) {

    .carousel-inner .carousel-item-end.active,
    .carousel-inner .carousel-item-next {
        transform: translateX(25%);
    }

    .carousel-inner .carousel-item-start.active, 
    .carousel-inner .carousel-item-prev {
        transform: translateX(-25%);
    }
}

.carousel-inner .carousel-item-end,
.carousel-inner .carousel-item-start { 
    transform: translateX(0);
}
</style>
@endpush

@push('scripts')
<script>
let items = document.querySelectorAll('#partnerCarousel.carousel .carousel-item')
		items.forEach((el) => {
			const minPerSlide = 4
			let next = el.nextElementSibling
			for (var i=1; i<minPerSlide; i++) {
				if (!next) {
            // wrap carousel by using first child
            next = items[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})
</script>
@endpush

@endisset