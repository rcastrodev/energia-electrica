
<a href="{{ route('post', ['id'=> $post->id]) }}" class="card post position-relative p-4 d-block text-decoration-none">
    @if (Storage::disk('custom')->exists($post->image))
        <img src="{{ asset($post->image) }}" class="card-img-top img-fluid">
    @else
        <img src="{{ asset('images/default.jpg') }}" class="card-img-top img-fluid"> 
    @endif
    <div class="card-body ps-0">
        <small class="text-purple font-size-14 d-block mb-2">{{ $post->content_4 }}</small>
        <h5 class="card-title font-size-20 mb-4 text-dark" style="font-weight: 400;">{{ $post->content_1 }}</h5>
        <div class="card-text font-size-18" style="color: #707070; font-weight: 300;">{!! Str::limit($post->content_2, 100) !!}</div>
    </div>
    <div class="position-absolute" style="left:25px; right:25px; bottom:20px;">
        <div class="d-flex justify-content-between">
            <small style="color:#939598;">{{ date('d/m/Y', strtotime($post->created_at)) }}</small>
            <img src="{{ asset('images/arrow.svg') }}" class="img-fluid">
        </div>
    </div>
</a>
