<div class="row">
    @if(count($videos) > 0)
    @foreach($videos as $video)
    <div class="col-lg-4">
        @include('front-end.shared.video-card')
    </div>
    @endforeach
    @else
    <div class="alert alert-danger col-lg-12">No Videos To View It.</div>
    @endif
</div>
<div class="row">
    <div class="col-lg-12">
        {!! $videos->links() !!}
    </div>
</div>
