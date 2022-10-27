<div id="pre-header" class="d-sm-none d-md-block bg-black font-size-12 py-2">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-3 d-inline-block">
                    <i class="fas fa-phone-alt text-white me-1"></i> 
                    @php $phone1 = Str::of($data->phone1)->explode('|') @endphp
                    @if (count($phone1) == 2)
                        <a href="tel:{{$phone1[0]}}" class="text-light underline underline">{{ $phone1[1] }}</a>
                    @else 
                        <a href="tel:{{$data->phone1}}" class="text-light underline underline">{{ $data->phone1 }}</a>
                    @endif   
                </div>
                <div class="d-inline-block email me-3">
                    <a href="mailto:{{ $data->email1 }}" class="mb-xs-2 mb-md-0 text-light underline underline" style="z-index: 100;">
                        <i class="fas fa-envelope text-white me-1"></i> {{ $data->email1 }}
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-center redes-sociales" style="z-index: 100;">
                @if ($data->instagram)
                    <a href="{{$data->instagram}}" class="text-white text-decoration-none me-2">
                        <i class="fab fa-instagram"></i>
                    </a>                
                @endif
                @if ($data->facebook)
                    <a href="{{$data->facebook}}" class="text-white text-decoration-none me-2">
                        <i class="fab fa-facebook-f"></i>
                    </a>            
                @endif
                @if ($data->twitter)
                    <a href="{{$data->twitter}}" class="text-white text-decoration-none">
                        <i class="fab fa-twitter"></i>
                    </a>               
                @endif
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light" style="box-shadow: 0px 10px 6px #0000000D;">
    <div class="container">
        <a class="navbar-brand logo" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" alt="" class="img-fluid logo-header">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center position-relative py-md-4 py-sm-2" id="navbarNav">
            <ul class="navbar-nav justify-content-end align-items-center w-100">
                <li class="nav-item @if(Request::is('/')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('/')) active @endif" href="{{ route('index') }}">Inicio</a>
                </li>
                <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                </li>
                <li class="nav-item @if(Request::is('servicios') || Request::is('servicio/*') ) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('servicios') || Request::is('servicio/*')) active @endif" href="{{ route('servicios') }}">Servicios</a>
                </li>
                <li class="nav-item @if(Request::is('clientes')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('clientes')) active @endif" href="{{ route('clientes') }}">Clientes</a>
                </li>
                <li class="nav-item @if(Request::is('blog') || Request::is('post/*')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('blog') || Request::is('post/*')) active @endif" href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item @if(Request::is('solicitud-de-presupuesto')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('solicitud-de-presupuesto')) active @endif" href="{{ route('cotizacion') }}">Solicitud de Presupuesto</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
