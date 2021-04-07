<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title ">{{ $pageTitle }}</h4>
                        <p class="card-category">{{ $pageDesc }}</p>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{ route($routeName.'.index') }}" class="btn btn-primary btn-round">Back <i class="fa fa-sign-out"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ $slot }}
            </div>
        </div>
    </div>
    @if(isset($video))
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                {{ $video }}
            </div>
        </div>
    </div>
    @endif
</div>
