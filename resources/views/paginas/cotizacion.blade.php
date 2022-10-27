@extends('paginas.partials.app')
@push('head')
    <meta name="url" content="{{ route('index') }}">
@endpush
@section('content')
<div class="bg-light d-flex align-items-center justify-content-center mb-100" style="height: 193px;">
    <h1 class="position-relative bg-purple text-white font-size-25 py-2">
        <div class="position-absolute left" style="left: -30px; height: 100%; background-color: #8C24A3; z-index: 5;
        width: 40px; top: 0; clip-path: polygon(59% 0, 76% 0, 76% 100%, 0% 100%);"></div>
        <span style="z-index: 10">SOLICITUD DE PRESUPUESTO</span>
        <div class="position-absolute right" style="clip-path: polygon(57% 0, 100% 0, 76% 100%, 58% 100%); right: -20px;
    height: 100%; background-color: #8C24A3; z-index: 10; width: 50px; top:0;"></div>
    </h1>
</div>
<div class="my-3">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <span class="d-block">{{$error}}</span>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>  
        @endif
        @if (Session::has('mensaje'))
            <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('mensaje') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>                    
        @endif
        <form action="{{ route('send-quote') }}" method="post" id="cotizadorOnline" enctype="multipart/form-data" class="py-sm-2 py-md-5" style="color: #666666;">
            @csrf
            <div id="section1">
                <div class="w-75 mx-auto">
                    <img src="{{ asset('images/s1.png') }}" alt="" class="mx-auto img-fluid mb-3 d-sm-none d-md-block" style="max-height: 200px; object-fit: contain; max-width: 450px;">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="" class="fw-bold mb-2">Nombre y Apellido</label>
                                <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control valid" placeholder="Ingrese aquí Nombre y Apellido *">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="" class="fw-bold mb-2">Correo Electrónico</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control valid" placeholder="Ingrese aquí Correo Electrónico *">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="" class="fw-bold mb-2">Empresa</label>
                                <input type="text" name="compania" value="{{ old('compania') }}" class="form-control" placeholder="Ingrese aquí su Empresa">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="" class="fw-bold mb-2">Teléfono</label>
                                <input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control" placeholder="Ingrese aquí Teléfono">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end py-3">
                        <button type="button" id="btnS1" class="btn text-uppercase font-size-16 text-white px-5 py-2 text-white bg-purple">Siguiente</button>
                    </div>
                </div>
            </div>
            <div id="section2" class="d-none">
                <div class="w-75 mx-auto">
                    <img src="{{ asset('images/s2.png') }}" alt="" class="d-block mx-auto img-fluid d-sm-none d-md-block" style="max-height: 200px;  object-fit: contain; max-width: 450px;">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <textarea name="message" class="form-control" cols="30" rows="10" placeholder="mensaje ...">{{ old('message') }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5 mb-sm-3 mb-md-5 position-relative">
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control" placeholder="examinar..." style="padding: 0; padding-left: 10px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-folder"></i></div>
                                </div>
                            </div>
                            <input type="file" name="file" class="form-control-file position-absolute" 
                            style="top: 2.5px; left: 15px; width: 100%; cursor: pointer;">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between py-3 col-sm-12">
                        <button type="button" id="btnS2" data-mover="seccion2" class="btn text-uppercase fw-bold font-size-16 px-sm-2 px-md-5 py-2" style="color: #8C24A3 !important; border: 1px solid #8C24A3;">Anterior</button>
                        <button type="submit" class="btn text-uppercase text-white fw-bold px-sm-2 px-md-5 font-size-16 bg-purple py-2">ENVIAR MENSAJE</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('head')
    <style>
        @media (max-width: 992px){
            .container .w-75{
                width: 100% !important;
            }
        }   
        textarea{
            border: 1px solid #8C24A3 !important;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/quote.js') }}"></script>
@endpush