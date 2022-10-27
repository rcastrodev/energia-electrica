@extends('adminlte::page')
@section('title', 'Blog')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar post</h1>
        <a href="{{ route('blog.content') }}" class="btn btn-sm btn-primary">blog</a>
    </div>
@stop
@section('content')
    <div class="mb-5">
        <form action="{{ route('blog.update', ['id' => $content->id]) }}" method="post" enctype="multipart/form-data" data-asyn="no">
            @csrf
            <div class="row">
                <div class="form-group col-sm-12 col-md-6">
                    <label for="">Título</label>
                    <input type="text" name="content_1" value="{{ $content->content_1 }}" class="form-control">
                </div>
                <div class="form-group col-sm-12 col-md-4">
                    <label for="">Categoría</label>
                    <select name="content_4" class="form-control">
                        <option value="NOVEDADES" @if($content->content_4 == 'NOVEDADES') selected @endif>NOVEDADES</option>
                        <option value="DATOS ÚTILES" @if($content->content_4 == 'DATOS ÚTILES') selected @endif>DATOS ÚTILES</option>
                        <option value="PROYECTOS REALIZADOS" @if($content->content_4 == 'PROYECTOS REALIZADOS') selected @endif>PROYECTOS REALIZADOS</option>
                    </select>
                </div>
                <div class="form-group col-sm-12 col-md-2">
                    <label for="">Ordén</label>
                    <input type="text" name="order" value="{{ $content->order }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="">Descripción corta</label>
                <textarea name="content_2" class="ckeditor form-control" cols="30" rows="10">{{ $content->content_2 }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Descripción larga</label>
                <textarea name="content_3" class="ckeditor form-control" cols="30" rows="10">{{ $content->content_3 }}</textarea>
            </div>
            @if (Storage::disk('custom')->exists($content->image))
                <img src="{{ asset($content->image) }}" class="img-fluid d-block mb-2 w-100" style="max-height: 140px; max-width:160px; object-fit:cover;">
            @endif
            <div class="form-group">
                <small>tamaño recomendado 1224x815px</small><br>
                <input type="file" name="image" class="form-control-file">
            </div>
            <button class="btn btn-primary w-100 d-block mt-3">Actualizar</button>
        </form>
    </div>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('blog.content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/blog/index.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@stop

