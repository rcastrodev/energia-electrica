@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de empresa</h1>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <h3>Sliders <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button></h3>
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section2)
    <form action="{{ route('company.content.updateInfo') }}" class="mb-5" method="post" data-asyn="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section2->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" name="content_1" class="form-control mb-3" value="{{$section2->content_1}}">
                    <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$section2->content_2}}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 mt-4">
                @if (Storage::disk('custom')->exists($section2->image2))
                    <div class="mb-3">
                        <img src="{{ asset($section2->image2) }}" class="img-fluid">
                        <button class="archive-destroy btn-sm  btn btn-danger" data-archivedestroy="{{ route('archive-destroy', ['column'=> 'image2', 'id' => $section2->id]) }}">Eliminar archivo</button>
                    </div>
                @endif
                <div class="form-group">
                    <small>imagen 231x231px</small>
                    <input type="file" name="image2" class="form-control-file">
                </div>
            </div>
            <div class="col-sm-12 col-md-3 mt-4">
                @if (Storage::disk('custom')->exists($section2->image3))
                    <div class="mb-3">
                        <img src="{{ asset($section2->image3) }}" class="img-fluid">
                        <button class="archive-destroy btn-sm  btn btn-danger" data-archivedestroy="{{ route('archive-destroy', ['column'=> 'image3', 'id' => $section2->id]) }}">Eliminar archivo</button>
                    </div>
                @endif
                <div class="form-group">
                    <small>imagen 231x231px</small>
                    <input type="file" name="image3" class="form-control-file">
                </div>
            </div>
        </div>
        <button class="btn btn-primary w-100">Actualizar</button>
    </form>  
@endisset
@isset($section3)
    <form action="{{ route('company.content.updateInfo') }}" class="mb-5" method="post" data-asyn="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section3->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-10">
                <div class="form-group">
                    <input type="text" name="content_1" class="form-control" value="{{ $section3->content_1 }}">
                </div>
            </div>
            <div class="col-sm-12 col-md-2">
                <button class="btn btn-primary w-100">Actualizar</button>
            </div>
        </div>
        
    </form>  
@endisset
<div class="row mb-5">
    <div class="col-sm-12">
        <h3>Beneficios <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-beneficio">crear</button></h3>
        <table id="page_table_beneficio" class="table">
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
<div class="row mb-5">
    <div class="col-sm-12">
        <h3>Empresa <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-empresa">crear</button></h3>
        <table id="page_table_empresa" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.company.modals.create')
@includeIf('administrator.company.modals.update')
@includeIf('administrator.company.beneficios.create')
@includeIf('administrator.company.beneficios.update')
@includeIf('administrator.company.empresa.create')
@includeIf('administrator.company.empresa.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js') }}"></script>
    <script>
        $('.archive-destroy').click(function(e){
            e.preventDefault();

            axios.post($(this).data('archivedestroy')).then(r => {
                $(this).closest('div').children('img').remove()
                $(this).remove()
            }).catch(error => console.error(error))
        })
    </script>
@stop

