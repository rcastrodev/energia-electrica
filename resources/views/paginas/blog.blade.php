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
@isset($posts)
    @if (count($posts))
        <div class="container mx-auto mb-100">
            <h2 class="font-size-20 fw-bol mb-3">CATEGORÍAS</h2>
            <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-dark active" id="todo-tab" data-bs-toggle="tab" data-bs-target="#todo" type="button" role="tab" aria-controls="todo" aria-selected="true">Todo</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-dark" id="novedades-tab" data-bs-toggle="tab" data-bs-target="#novedades" type="button" role="tab" aria-controls="novedades" aria-selected="false">Novedades</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-dark" id="proyectos-tab" data-bs-toggle="tab" data-bs-target="#proyectos" type="button" role="tab" aria-controls="proyectos" aria-selected="false">Proyectos Realizados</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-dark" id="datos-tab" data-bs-toggle="tab" data-bs-target="#datos" type="button" role="tab" aria-controls="datos" aria-selected="false">Datos Útiles</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="todo" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-sm-12 col-md-4 mb-4">
                                @includeIf('paginas.partials.post', ['post' => $post])
                            </div>        
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="novedades" role="tabpanel" aria-labelledby="novedades-tab">
                    <div class="row">
                        @foreach ($posts->where('content_4', 'NOVEDADES') as $post)
                            <div class="col-sm-12 col-md-4 mb-4">
                                @includeIf('paginas.partials.post', ['post' => $post])
                            </div> 
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="proyectos" role="tabpanel" aria-labelledby="proyectos-tab">
                    <div class="row">
                        @foreach ($posts->where('content_4', 'PROYECTOS REALIZADOS') as $post)
                            <div class="col-sm-12 col-md-4 mb-4">
                                @includeIf('paginas.partials.post', ['post' => $post])
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="datos" role="tabpanel" aria-labelledby="datos-tab">
                    <div class="row">
                        @foreach ($posts->where('content_4', 'DATOS ÚTILES') as $post)
                            <div class="col-sm-12 col-md-4 mb-4">
                                @includeIf('paginas.partials.post', ['post' => $post])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endisset
@endsection