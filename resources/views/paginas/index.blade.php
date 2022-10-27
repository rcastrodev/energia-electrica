@extends('paginas.partials.app')
@section('content')
@isset($section1s)
	@if (count($section1s))
		<div id="sliderHero" class="carousel slide position-relative" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>	
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif" style="background-image: url({{ asset($v->image) }}); background-size: 100% 100%; background-repeat: no-repeat;">
						<div class="carousel-caption container position-static mx-auto" >
							<div class="content-carousel-caption" style="max-width: 650px;">
								<h2 class="font-size-41 text-white mb-sm-0 mb-md-4">{{ $v->content_1 }}</h2>
								<div class="text-white d-sm-none d-md-block">{!! $v->content_2 !!}</div>
							</div>
							
						</div>
					</div>
				@endforeach
			</div>
		</div>		
	@endif
@endisset	
@isset($services)
	@if (count($services))
		<div class="mb-100">
			<div class="">
				<div class="bg-purple text-white text-center py-4 font-size-25 mb-5">NUESTROS SERVICIOS</div>
				@foreach ($services as $service)
					@includeIf('paginas.partials.servicio', ['service' => $service])
				@endforeach
			</div>
		</div>
	@endif
@endisset
@isset($section2)
	<section id="section2" class="mb-100">
		<div class="row m-0">
			<div class="col-sm-12 col-md-5 pe-0 d-sm-none d-md-block bg-light">
				<img src="{{Storage::disk('custom')->url($section2->image)}}" class="img-fluid w-100">
			</div>
			<div class="col-sm-12 col-md-7 d-flex flex-column justify-content-center ps-sm-2 ps-md-0 py-sm-3 py-md-5 text-sm-center text-md-start position-relative" style="background: linear-gradient(to left, #8c24a2, #2a0632 90%);">
				<div class="position-absolute d-sm-none d-md-block" style="clip-path: polygon(0 0, 24% 0, 25% 100%, 10% 100%); height: 100%; background-color: #2a0632; width: 100%; top:0; left: -48px;
				width: 200px;"></div>
				<h4 class="mb-4 font-size-25 fw-bold ps-sm-2 ps-md-5 text-white">{{ $section2->content_1 }}</h4>
				<div class="font-size-18 ps-sm-2 ps-md-5 mb-sm-2 mb-md-5" style="max-width: 600px;">
					<div class="text-white mb-4">{!! $section2->content_2 !!}</div>
					<div class="">
						<a href="{{ route('contacto') }}" class="btn-contact text-uppercase bg-white py-2 px-5 fw-bold text-decoration-none text-purple font-size-14 btn">contactanos</a>
					</div>
				</div>
			</div>
		</div>
	</section>
@endisset
@isset($posts)
	@if (count($posts))
		<div class="bg-light py-5 mb-100">
			<div class="container mx-auto">
				<div class="d-flex justify-content-between align-items-center mb-5">
					<h3 class="text-purple font-size-25">NUESTRO BLOG</h3>
					<a href="{{ route('blog') }}" class="text-decoration-none text-purple text-uppercase bg-white btn font-size-16 px-4 py-2 btn-contact" style="border: 1px solid #8C24A3;">ver más</a>
				</div>
				<div class="row">
					@foreach ($posts as $post)
						<div class="col-sm-12 col-md-4 mb-sm-2 mb-md-4">
							@includeIf('paginas.partials.post', ['post' => $post])
						</div>
					@endforeach
				</div>
			</div>
		</div>
	@endif
@endisset
@endsection