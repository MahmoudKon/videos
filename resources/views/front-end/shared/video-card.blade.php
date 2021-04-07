<div class="card">
    <a href="{{ route('front.video', $video) }}" title="{{ $video->name }}"  style="height: 160px;">
        <img class="card-img-top" src="{{ URL('uploads/'.$video->image) }}" alt="{{ $video->name }}"  style="height: 160px;">
    </a>
    <div class="card-body">
        <a href="{{ route('front.video', $video) }}"><h4 class="card-title">{{ $video->name }}</h4></a>
        <small>{{ $video->created_at->diffForHumans() }}</small>
        <p class="card-text" style="height: 45px; overflow: hidden;">{{ substr($video->des, 0, 95) }}</p>
        <a href="{{ route('front.video', $video) }}" class="btn btn-primary" title="{{ $video->name }}">View Video</a>
    </div>
</div>
