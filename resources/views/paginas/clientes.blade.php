@extends('paginas.partials.app')
@section('content')
@isset($section1)
    <div class="header-page mb-100 d-flex align-items-end" style="background-image: url({{ asset($section1->image) }}); ">
        <h1 class="position-relative bg-purple text-white font-size-25">
            {{ $section1->content_1 }}
            <div class="position-absolute right" style="clip-path: polygon(57% 0, 100% 0, 76% 100%, 58% 100%); right: -20px;
        height: 100%; background-color: #8C24A3; z-index: 10; width: 50px; top:0;"></div>
        </h1>
    </div>
@endisset
@isset($clients)
    @if ($clients->count())
        <section class="d-flex flex-wrap my-3 container mx-auto my-sm-3 py-md-5">
            @foreach ($clients as $v)
                <div class="content-client d-flex justify-content-center align-items-center cliente mb-sm-2 mb-md-5" style="height: 140px;">
                    <img src="{{ asset($v->image) }}" class="img-fluid" style="object-fit: cover">
                </div>
            @endforeach                
        </section> 
    @endif
@endisset
@endsection