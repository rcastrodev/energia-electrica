@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-2 font-size-14 mb-100" style="background-color: #189fac05;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('blog') }}" class="text-decoration-none text-dark text-uppercase fw-bold">BlOG</a></li>
			<li class="breadcrumb-item"><a href="{{ route('blog') }}" class="text-decoration-none text-dark text-uppercase fw-bold">{{ $post->content_4 }}</a></li>
			<li class="breadcrumb-item active text-purple text-uppercase" aria-current="page">{{ $post->content_1 }}</li>
		</ol>
	</div>
</div>
<div class="ribbon text-white d-inline-block py-2 px-5 text-uppercase mb-5 position-relative" style="background-color: #8D8D8D;">
	{{ $post->content_1 }}
	<div class="position-absolute right" style="clip-path: polygon(57% 0, 100% 0, 76% 100%, 58% 100%); right: -20px;
        height: 100%; background-color: #8D8D8D; z-index: 10; width: 50px; top:0;"></div>
</div>
<div class="container mx-auto">
    @if (Storage::disk('custom')->exists($post->image))
        <img src="{{ asset($post->image) }}" class="img-fluid w-100 d-block mx-auto mb-5"> 
    @else
        <img src="{{ asset('images/default.jpg') }}" class="img-fluid w-100 d-block mx-auto mb-5"> 
    @endif
    <div class="content-post mb-100">{!!$post->content_3!!}</div>
</div>
@endsection

