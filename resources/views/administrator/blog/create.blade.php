@extends('adminlte::page')
@section('title', 'Blog')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear post</h1>
        <a href="{{ route('service.content') }}" class="btn btn-sm btn-primary">Blog</a>
    </div>
@stop
@section('content')
    <div class="mb-5">
        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data" data-asyn="no">
            @csrf
            <input type="hidden" name="section_id" value="13">

            <div class="row">
                <div class="form-group col-sm-12 col-md-6">
                    <label for="">Título</label>
                    <input type="text" name="content_1" value="{{ old('content_1') }}" placeholder="Título" class="form-control">
                </div>
                <div class="form-group col-sm-12 col-md-4">
                    <label for="">Categoría</label>
                    <select name="content_4" class="form-control">
                        <option value="NOVEDADES">NOVEDADES</option>
                        <option value="DATOS ÚTILES">DATOS ÚTILES</option>
                        <option value="PROYECTOS REALIZADOS">PROYECTOS REALIZADOS</option>
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-2">
                    <label for="">Ordén</label>
                    <input type="text" name="order" value="{{ old('order') }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="">Descripción corta</label>
                <textarea name="content_2" class="ckeditor form-control" cols="30" rows="10">{{ old('content_2') }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Contenido</label>
                <textarea name="content_3" class="ckeditor form-control" cols="30" rows="10">{{ old('content_2') }}</textarea>
            </div>
            <div class="form-group">
                <small>tamaño recomendado 1224x815px</small><br>
                <input type="file" name="image" class="input-form-file">
            </div>
            <button class="btn btn-primary w-100 d-block mt-3">Guardar</button>
        </form>
    </div>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('service.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/blog/index.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@stop

