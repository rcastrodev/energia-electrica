@extends('paginas.partials.app')
@section('content')
@if ($section1s)
	@if (count($section1s))
		<div id="sliderHeroEmpresa" class="carousel slide" data-bs-interval	="3000" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHeroEmpresa" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
				@endforeach
			</div>
			<div class="carousel-inner" >
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif" style="background-image: url({{ asset($v->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
					</div>			
				@endforeach
			</div>	
		</div>	
	@endif
@endif
@isset($section2)
	<section id="section_2" class="pt-sm-3 pt-md-5 mb-100">
		<div class="container py-sm-0 py-md-3">
			<div class="row">
				<div class="col-sm-12 col-md-6 mb-4">
					<div class="mb-4">
						<h4 class="font-size-25 text-purple fw-bold mb-4">{{$section2->content_1 }}</h4>
						<div class="" style="color: #0E0E0E">{!! $section2->content_2!!}</div>
					</div>			
				</div>
				<div class="col-sm-12 col-md-6 d-flex flex-wrap justify-content-md-end justify-content-sm-center">
					@if (Storage::disk('custom')->exists($section2->image2))
						<img src="{{ asset($section2->image2) }}" class="img-fluid d-block me-sm-0 me-md-2 mb-sm-3 mb-md-0" style="object-fit: cover; width:231px; height:231px;">
					@endif
					@if (Storage::disk('custom')->exists($section2->image3))
						<img src="{{ asset($section2->image3) }}" class="img-fluid mb-sm-3 mb-md-0" style="object-fit: cover; width:231px; height:231px;">
					@endif	
				</div>		
			</div>
		</div>
	</section>
@endisset
@if (isset($section3) && isset($section4s))
	@if (count($section4s))
		<div class="bg-light py-4 mb-100">
			<div class="container mx-auto">
				<div class="position-relative">
					<div class="position-absolute left" style="clip-path: polygon(29% 0, 100% 0, 100% 100%, 0 100%); left: -20px;
					height: 100%; background-color: #8C24A3; z-index: 10; width: 50px;"></div>
					<h4 class="bg-purple text-white text-center py-2 font-size-24 mb-4" >{{ $section3->content_1 }}</h4>
					<div class="position-absolute right" style="clip-path: polygon(57% 0, 100% 0, 76% 100%, 58% 100%); right: -20px;
					height: 100%; background-color: #8C24A3; z-index: 10; width: 50px; top:0;"></div>
				</div>
				<div class="row">
					@foreach ($section4s as $section4)
						<div class="col-sm-12 col-md-4 mb-5">
							<div class="d-flex align-items-baseline">
								@if (Storage::disk('custom')->exists($section4->image))
									<img src="{{ asset($section4->image) }}" class="img-fluid d-block me-2" style="width: 24px; height:24px;">
								@endif
								<h5 class="text-purple font-size-18">{{ $section4->content_1 }}</h5>
							</div>
							<div class="font-size-16">{!!$section4->content_2!!}</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	@endif
@endif
@if (isset($section5s))
	@if (count($section5s))
		<div class="mb-100">
			<div class="container mx-auto">
				<div class="row">
					@foreach ($section5s as $section5)
						<div class="col-sm-12 col-md-4 mb-5">
							<div class="bg-light py-3 px-4 text-center" style="min-height: 200px;">
								<h5 class="text-purple font-size-24	mb-4" style="font-weight: 500;">{{ $section5->content_1 }}</h5>
								<div class="font-size-14">{!!$section5->content_2!!}</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	@endif
@endif
@endsection
