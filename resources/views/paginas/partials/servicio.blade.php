<a href="{{ route('servicio', ['id'=>$service->id]) }}" class="row mb-5 container mx-auto servicio text-decoration-none">
    <div class="col-sm-12 col-md-4 pe-md-0 ps-0 bg-light">
        @if (Storage::disk('custom')->exists($service->image))
            <img src="{{ asset($service->image) }}" class="img-fluid w-100 my-sm-2 my-md-0" style="object-fit: cover; height:293px;">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid w-100 my-sm-2 my-md-0" style="object-fit: cover; height:293px;">
        @endif
    </div>
    <div class="col-sm-12 col-md-8 bg-light d-flex align-items-center ps-md-0">
        <div class="mx-auto" style="max-width: 470px;">
            <h4 class="font-size-20 fw-bold text-purple mb-4">{{ $service->content_1 }}</h4>
            <div class="mb-3" style="color: #707070">{!!$service->content_2!!}</div>
            <img src="{{ asset('images/arrow.svg') }}" alt="">
        </div>
    </div>
</a>