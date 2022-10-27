@extends('adminlte::page')
@section('title', 'Servicios')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear servicio</h1>
        <a href="{{ route('service.content') }}" class="btn btn-sm btn-primary">servicios</a>
    </div>
@stop
@section('content')
    <div class="mb-5">
        <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data" data-asyn="no">
            @csrf
            <input type="hidden" name="section_id" value="9">

            <div class="row">
                <div class="form-group col-sm-12 col-md-10">
                    <label for="">Título</label>
                    <input type="text" name="content_1" value="{{ old('content_1') }}" placeholder="Título" class="form-control">
                </div>
                <div class="form-group col-sm-12 col-md-2">
                    <label for="">Ordén</label>
                    <input type="text" name="order" value="{{ old('order') }}" placeholder="Ej AA BB" class="form-control">
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="">Descripción corta</label>
                        <textarea name="content_2" class="ckeditor form-control" cols="30" rows="10">{{ old('content_2') }}</textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="">Descripción larga</label>
                        <textarea name="content_3" class="ckeditor form-control" cols="30" rows="10">{{ old('content_2') }}</textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <small>Imagen card tamaño recomendado 504x293px</small>
                    <input type="file" name="image" class="form-control-file">
                </div>
                <div class="col-sm-12 col-md-4">
                    <small>Imagen post recomendado 1224x734px</small>
                    <input type="file" name="image2" class="form-control-file">
                </div>
                <div class="col-sm-12 col-md-4">
                    <small>Imagen post recomendado 591x580px</small>
                    <input type="file" name="image3" class="form-control-file">
                </div>
                <div class="col-sm-12 col-md-4">
                    <small>Imagen post recomendado 591x580px</small>
                    <input type="file" name="image4" class="form-control-file">
                </div>
                <button class="btn btn-primary w-100 d-block mt-3">Guardar</button>
            </div>
        </form>
    </div>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('service.content')}}">
    <meta name="url2" content="{{route('variable-content.destroy')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/services/index.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@stop

