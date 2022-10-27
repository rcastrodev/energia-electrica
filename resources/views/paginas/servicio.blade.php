@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-2 font-size-14 mb-100" style="background-color: #189fac05;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('servicios') }}" class="text-decoration-none text-dark text-uppercase fw-bold">SERVICIOS</a></li>
			<li class="breadcrumb-item active text-purple text-uppercase" aria-current="page">{{ $service->content_1 }}</li>
		</ol>
	</div>
</div>
<div class="container mx-auto">
    <div class="text-center mb-100 mx-auto" style="max-width: 400px;">
        <h1 class="text-purple font-size-25 fw-bold mb-4">{{ $service->content_1 }}</h1>
        <div class="" style="color: #707070;">{!! $service->content_3  !!}</div>
    </div>
    @if (count($service->variables))
        <div class="d-flex flex-wrap @if (count($service->variables) < 4) justify-content-center @else justify-content-between @endif mb-100">
            @foreach ($service->variables as $k => $variable)
                <div class="text-center @if (count($service->variables) < 4 && $k != array_key_last(collect($service->variables)->toArray())) me-sm-0 me-md-5 @endif">
                    @if (Storage::disk('custom')->exists($variable->image))
                        <img src="{{ asset($variable->image) }}" class="d-block mx-auto">
                    @endif
                    <h5 class="text-center text-purple fw-bold font-size-18" style="border-top: 1px solid #8D8D8D;
                    display: inline-block; padding-top: 10px; margin-top: 20px;">{{ $variable->content_1 }}</h5>
                </div>
            @endforeach
        </div>
    @endif
    <div class="row mb-100">
        @if (Storage::disk('custom')->exists($service->image2))
            <div class="col-sm-12 mb-4">
                <img src="{{ asset($service->image2) }}" class="img-fluid d-block mx-auto">
            </div>  
        @endif
        @if (Storage::disk('custom')->exists($service->image3))
            <div class="col-sm-12 col-md-6 mb-4">
                <img src="{{ asset($service->image3) }}" class="img-fluid d-block mx-auto">
            </div>  
        @endif
        @if (Storage::disk('custom')->exists($service->image4))
            <div class="col-sm-12 col-md-6 mb-4">
                <img src="{{ asset($service->image4) }}" class="img-fluid d-block mx-auto">
            </div>  
        @endif
    </div>
</div>

@isset($services)
    @if (count($services))
    <div class="py-2 text-purple text-center text-uppercase fw-bold bg-light mb-5">otros servicios</div>
    <div class="container row mx-auto">
        @foreach ($services as $s)
            <div class="col-sm-12 col-md-4 mb-4">
                <a href="{{ route('servicio', ['id'=> $s->id]) }}" class="card post position-relative p-4 d-block text-decoration-none" style="height: 430px !important;">
                    @if (Storage::disk('custom')->exists($s->image))
                        <img src="{{ asset($s->image) }}" class="card-img-top img-fluid" style="height: 190px;">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" class="card-img-top img-fluid" style="height: 190px;"> 
                    @endif
                    <div class="card-body ps-0">
                        <h5 class="card-title font-size-20 mb-4 text-purple fw-bold" style="font-weight: 400;">{{ $s->content_1 }}</h5>
                        <div class="card-text font-size-18" style="color: #707070; font-weight: 300;">{!! Str::limit($s->content_2, 100) !!}</div>
                    </div>
                    <div class="position-absolute" style="left:25px; right:25px; bottom:20px;">
                        <div class="d-flex justify-content-start">
                            <img src="{{ asset('images/arrow.svg') }}" class="img-fluid">
                        </div>
                    </div>
                </a>    
            </div>
        @endforeach
    </div>    
    @endif
@endisset

@endsection

