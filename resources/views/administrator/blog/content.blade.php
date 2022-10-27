@extends('adminlte::page')
@section('title', 'Blog')
@section('content_header')
@stop
@section('content')
    <form action="{{ route('blog.update') }}" method="post" enctype="multipart/form-data" data-asyn="no">
        @csrf
        <input type="hidden" name="id" value="{{ $header->id}}">
        <div class="form-group">
            <input type="text" name="content_1" value="{{$header->content_1}}" class="form-control">
        </div>
        <div class="form-group">
            @if (Storage::disk('custom')->exists($header->image))
                <img src="{{ asset($header->image) }}" class="img-fluid d-block mb-3">
            @endif
            <small>tamaño recomendado 1366x193px</small>
            <input type="file" name="image" class="form-control-file">
            <button class="btn btn-primary mt-3">Actualizar</button>
        </div>
    </form>
    <div class="row mb-5">
        <div class="col-sm-12">
            <div class="d-flex my-3">
                <h4 class="mr-3">Blog</h4><a href="{{ route('blog.create') }}" class="btn btn-sm btn-primary">crear</a>
            </div>
            <table id="page_table_slider" class="table">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Contenido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('blog.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/blog/index.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@stop

