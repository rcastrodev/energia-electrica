<footer class="py-sm-3 py-md-5 font-size-14 text-sm-center text-md-start bg-purple position-relative">
    <img src="{{ asset('images/footer.svg') }}" class="position-absolute" style="top: 0; right: 0; max-height: 100%;">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-center justify-content-center mb-sm-4 mb-md-0">
                <img src="{{ asset($data->logo_footer) }}" class="d-block mx-auto mb-4 img-fluid">
                <div class="redes-sociales text-center">
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
            <div class="col-sm-12 col-md-3">
                <div class="row justify-content-between d-sm-none d-md-flex">
                    <div class="col-sm-12 mb-4">
                        <h6 class="text-uppercase font-weight-600 text-light">secciones</h6>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('index') }}" class="d-block text-decoration-none text-light mb-1 underline">Inicio</a>
                        <a href="{{ route('empresa') }}" class="d-block text-decoration-none text-light mb-1 underline">Empresa</a>
                        <a href="{{ route('servicios') }}" class="d-block text-decoration-none text-light mb-1 underline">Servicios</a>
                        <a href="{{ route('clientes') }}" class="d-block text-decoration-none text-light mb-1 underline">Clientes</a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('blog') }}" class="d-block text-decoration-none text-light mb-1 underline">Blog</a>
                        <a href="{{ route('cotizacion') }}" class="d-block text-decoration-none text-light mb-1 underline">Solicitud de Presupuesto</a>
                        <a href="{{ route('contacto') }}" class="d-block text-decoration-none text-light mb-1 underline">Contacto</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 font-size-13 mb-sm-4 mb-md-0">
                <div class="row">
                    <h6 class="text-uppercase text-light font-weight-600 mb-4">DATOS DE CONTACTO</h6>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-light d-block me-2"></i>
                        <address class="d-block text-light m-0"> {{ $data->address }}</address>
                    </div>
                    <div class="d-flex align-items-center mb-3">    
                        <i class="fas fa-phone-alt text-light me-2"></i>  
                        @php $phone1 = Str::of($data->phone1)->explode('|') @endphp
                        @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                        @php $email1 = Str::of($data->email1)->explode('|') @endphp
                        @php $email2 = Str::of($data->email2)->explode('|') @endphp
                        @if (count($phone1) == 2)
                            <a href="tel:{{$phone1[0]}}" class="text-light underline text-decoration-none">{{ $phone1[1] }}</a>
                        @else 
                            <a href="tel:{{$data->phone1}}" class="text-light underline text-decoration-none">{{ $data->phone1 }}</a>
                        @endif  
                        @if (count($phone2) == 2)
                            <span class="text-light px-1">/</span>
                            <a href="tel:{{$phone2[0]}}" class="text-light underline text-decoration-none">{{ $phone2[1] }}</a>
                        @else 
                            <span class="text-light px-1">/</span>
                            <a href="tel:{{$data->phone2}}" class="text-light underline text-decoration-none">{{ $data->phone2 }}</a>
                        @endif  
                    </div>
                    <div class="d-flex mb-3">
                        <i class="far fa-envelope text-light d-block me-2 mt-1"></i><span class="d-block"></span>
                        <div class="">
                            @if (count($email1))
                            <a href="mailto:{{ $email1[0] }}" class="text-light text-decoration-none underline d-block">{{ $email1[0] }}</a>  
                            @else 
                                <a href="mailto:{{ $data->email1 }}" class="text-light text-decoration-none underline d-block">{{ $data->email1 }}</a>    
                            @endif
                            @if (count($email2))
                                <a href="mailto:{{ $email2[0] }}" class="text-light text-decoration-none underline d-block">{{ $email2[0] }}</a>  
                            @else 
                                <a href="mailto:{{ $data->email2 }}" class="text-light text-decoration-none underline d-block">{{ $data->email2 }}</a>    
                            @endif  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="text-white p-2 font-size-13 bg-black py-3">
    <div class="container mx-auto text-center">
        <span>® Energía Eléctrica - Todos los derechos reservados |</span>
        <a href="https://osole.com.ar/" class="text-white underline text-decoration-none">BY OSOLE</a>
    </div>
</div>
@isset($data->phone3)
    @if (count($phone3) == 2)
        <a href="https://wa.me/{{$phone3[0]}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
            <i class="fab fa-whatsapp"></i>
        </a>  
    @else 
        <a href="https://wa.me/{{$data->phone3}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
            <i class="fab fa-whatsapp"></i>
        </a>  
    @endif   
@endisset

