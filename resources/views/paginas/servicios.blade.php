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
@isset($services)
    @if (count($services))
        @foreach ($services as $service)
            @includeIf('paginas.partials.servicio', ['service' => $service])
        @endforeach
    @endif
@endisset
@endsection

