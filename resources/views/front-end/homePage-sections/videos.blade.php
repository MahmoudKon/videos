<div class="section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="title">Latest Videos</h2>
                <h5 class="description">Keep learning, latest video based on published day</h5>
            </div>
        </div>
        <br>
        <br>
        <div class="text-left">
            @include('front-end.shared.video-row')
        </div>
        <a href="{{ route('home') }}" class="btn btn-danger btn-round">See More</a>
    </div>
</div>
