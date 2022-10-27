@extends('paginas.partials.app')
@section('content')
<div class="bg-light d-flex align-items-center justify-content-center mb-100" style="height: 193px;">
    <h1 class="position-relative bg-purple text-white font-size-25 py-2 px-5">
        <div class="position-absolute left" style="left: -30px; height: 100%; background-color: #8C24A3; z-index: 5;
        width: 40px; top: 0; clip-path: polygon(59% 0, 76% 0, 76% 100%, 0% 100%);"></div>
        <span style="z-index: 10">CONTACTANOS</span>
        <div class="position-absolute right" style="clip-path: polygon(57% 0, 100% 0, 76% 100%, 58% 100%); right: -20px;
    height: 100%; background-color: #8C24A3; z-index: 10; width: 50px; top:0;"></div>
    </h1>
</div>
<div class="container mx-auto">
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
    <div class="row mb-100">
        <div class="col-sm-12 col-md-4">
            <h4 class="text-purple font-size-20 fw-bold">ENERGÍA ELÉCTRICA</h4>
            <p class="text-dark font-size-18">Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.</p>
            @php $email1 = Str::of($data->email1)->explode('|') @endphp
            @php $email2 = Str::of($data->email2)->explode('|') @endphp
            <div class="d-flex align-items-center mb-3">
                <i class="far fa-envelope text-purple d-block me-2 mt-1"></i><span class="d-block"></span>
                <div class="">
                    @if (count($email1))
                    <a href="mailto:{{ $email1[0] }}" class="text-dark text-decoration-none underline d-block">{{ $email1[0] }}</a>  
                    @else 
                        <a href="mailto:{{ $data->email1 }}" class="text-dark text-decoration-none underline d-block">{{ $data->email1 }}</a>    
                    @endif
                    @if (count($email2))
                        <a href="mailto:{{ $email2[0] }}" class="text-dark text-decoration-none underline d-block">{{ $email2[0] }}</a>  
                    @else 
                        <a href="mailto:{{ $data->email2 }}" class="text-dark text-decoration-none underline d-block">{{ $data->email2 }}</a>    
                    @endif  
                </div>                     
            </div>
            @php $phone1 = Str::of($data->phone1)->explode('|') @endphp
            @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
            <div class="d-flex align-items-center mb-3">
                <i class="fas fa-phone-alt font-size-18 d-block me-3 text-purple"></i>
                @if (count($phone1) == 2)
                    <a href="tel:{{$phone1[0]}}" class="text-dark underline text-decoration-none">{{ $phone1[1] }}</a>
                @else 
                    <a href="tel:{{$data->phone1}}" class="text-dark underline text-decoration-none">{{ $data->phone1 }}</a>
                @endif  
                @if (count($phone2) == 2)
                    <span class="text-dark px-1">/</span>
                    <a href="tel:{{$phone2[0]}}" class="text-dark underline text-decoration-none">{{ $phone2[1] }}</a>
                @else 
                    <span class="text-dark px-1">/</span>
                    <a href="tel:{{$data->phone2}}" class="text-dark underline text-decoration-none">{{ $data->phone2 }}</a>
                @endif      
            </div>
            <div class="d-flex align-items-center mb-3">
                <i class="fas fa-map-marker-alt me-3 text-purple"></i> 
                <address class="mb-0" style="color: #1F1A15;">{{$data->address}}</address>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3273.060770070173!2d-58.53856078496842!3d-34.87982028038887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcd741edb34419%3A0x6320446a13d9b3f0!2sLos%20Talas%20940%2C%20La%20Union%2C%20Provincia%20de%20Buenos%20Aires%2C%20Argentina!5e0!3m2!1ses!2sve!4v1644787873210!5m2!1ses!2sve" height="428" style="border:0; width:100%;" allowfullscreen="" loading="lazy" class="rMenu"></iframe>
        </div>
    </div>
</div>
<div class="container bg-light pt-5 mb-100 px-md-0">
    <div class="bg-purple py-2 text-center text-white mb-5">ENVIANOS TU CONSULTA</div>
    <form action="{{ route('send-contact') }}" method="post" enctype="multipart/form-data" class="mx-auto" style="max-width:800px;">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="mb-2">Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese aquí Nombre *" class="form-control font-size-14">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-3">
                <div class="form-group">
                    <label for="" class="mb-2">Apellido</label>
                    <input type="text" name="apellido" value="{{ old('apellido') }}" placeholder="Ingrese aquí Apellido *" class="form-control font-size-14">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                <div class="form-group">
                    <label for="" class="mb-2">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Ingrese aquí Correo Electrónico *" class="form-control font-size-14">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-sm-3">
                <div class="form-group">
                    <label for="" class="mb-2">Teléfono</label>
                    <input type="text" name="telefono" value="{{ old('telefono') }}" placeholder="Ingrese aquí Teléfono" class="form-control font-size-14">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                <div class="form-group">
                    <label for="" class="mb-2">Mensaje</label>
                    <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5" placeholder="Escriba aquí su mensaje *">{{ old('mensaje') }}</textarea>
                    <small style="color: #939598;">* campos obligatorios</small>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mb-sm-3">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="termino" id="termino">
                    <label class="form-check-label font-size-13" for="termino">Acepto los términos y condiciones de privacidad *</label>
                    </div>
                <div class="form-group">
                    {!! app('captcha')->display() !!}
                </div>
            </div>
            <div class="col-sm-12 mb-sm-3 mb-sm-3 text-end">
                <button type="submit" class="text-uppercase btn bg-purple font-size-14 py-2 mb-sm-3 mb-md-0 ancho-boton text-white px-5">Enviar</button>
            </div>
        </div>
    </form>
</div>

@endsection

