@extends('adminlte::page')
@section('title', 'Servicios')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar servicio</h1>
        <a href="{{ route('service.content') }}" class="btn btn-sm btn-primary">servicios</a>
    </div>
@stop
@section('content')
    <div class="mb-5">
        <form action="{{ route('service.update', ['id' => $content->id]) }}" method="post" enctype="multipart/form-data" data-asyn="no">
            @csrf
            <input type="hidden" id="content_id" value="{{$content->id}}">
            <div class="row">
                <div class="form-group col-sm-12 col-md-10">
                    <label for="">Título</label>
                    <input type="text" name="content_1" value="{{ $content->content_1 }}" class="form-control">
                </div>
                <div class="form-group col-sm-12 col-md-2">
                    <label for="">Ordén</label>
                    <input type="text" name="order" value="{{ $content->order }}" placeholder="Ej AA BB" class="form-control">
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="">Descripción corta</label>
                        <textarea name="content_2" class="ckeditor form-control" cols="30" rows="10">{{ $content->content_2 }}</textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="">Descripción larga</label>
                        <textarea name="content_3" class="ckeditor form-control" cols="30" rows="10">{{ $content->content_3 }}</textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    @if (Storage::disk('custom')->exists($content->image))
                        <img src="{{ asset($content->image) }}" class="img-fluid d-block mb-2 w-100" style="max-height: 140px; object-fit:cover;">
                        <button class="archive-destroy btn-sm  btn btn-danger d-inline-block mb-2" data-archivedestroy="{{ route('archive-destroy', ['column'=> 'image', 'id' => $content->id]) }}">Eliminar archivo</button>
                    @endif
                    <small>Imagen card tamaño recomendado 504x293px</small>
                    <input type="file" name="image" class="form-control-file">
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    @if (Storage::disk('custom')->exists($content->image2))
                        <img src="{{ asset($content->image2) }}" class="img-fluid d-block mb-2 w-100" style="max-height: 140px; object-fit:cover;">
                        <button class="archive-destroy btn-sm  btn btn-danger d-inline-block mb-2" data-archivedestroy="{{ route('archive-destroy', ['column'=> 'image2', 'id' => $content->id]) }}">Eliminar archivo</button>
                    @endif
                    <small>Imagen post recomendado 1224x734px</small>
                    <input type="file" name="image2" class="form-control-file">
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    @if (Storage::disk('custom')->exists($content->image3))
                        <img src="{{ asset($content->image3) }}" class="img-fluid d-block mb-2 w-100" style="max-height: 140px; object-fit:cover;">
                        <button class="archive-destroy btn-sm  btn btn-danger d-inline-block mb-2" data-archivedestroy="{{ route('archive-destroy', ['column'=> 'image3', 'id' => $content->id]) }}">Eliminar archivo</button>
                    @endif
                    <small>Imagen post recomendado 591x580px</small>
                    <input type="file" name="image3" class="form-control-file">
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    @if (Storage::disk('custom')->exists($content->image4))
                        <img src="{{ asset($content->image4) }}" class="img-fluid d-block mb-2 w-100" style="max-height: 140px; object-fit:cover;">
                        <button class="archive-destroy btn-sm  btn btn-danger d-inline-block mb-2" data-archivedestroy="{{ route('archive-destroy', ['column'=> 'image4', 'id' => $content->id]) }}">Eliminar archivo</button>
                    @endif
                    <small>Imagen post recomendado 591x580px</small>
                    <input type="file" name="image4" class="form-control-file">
                </div>
                <button class="btn btn-primary w-100 d-block mt-3">Actualizar</button>
            </div>
        </form>
    </div>
    <div class="row mb-5">
        <div class="col-sm-12">
            <div class="d-flex">
                <h4 class="mr-3">Crear Característica</h4>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button>
            </div>
            <table id="page_table_caracteristicas" class="table">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@includeIf('administrator.services.modals.create')
@includeIf('administrator.services.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('service.content')}}">
    <meta name="url2" content="{{route('variable-content.destroy')}}">
    <meta name="content_find" content="{{route('variable-content.find')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/services/index.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
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

