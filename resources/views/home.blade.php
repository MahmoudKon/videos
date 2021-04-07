@extends('layouts.app')

@section('title', 'Videos')

@section('content')
<div class="section section-buttons" style="min-height: 560px;">
    <div class="container">
        <div class="title">
            <h1>Latest Videos</h1>
            @if(request()->has('search') && request()->get('search') != '')
                <p>you are search on | <b><i><u>{{ request()->get('search') }}</u></i></b> | <a href="{{ route('home') }}"> Reset</a></p>
            @endif
        </div>
        <div class="row">
            @if(count($videos) > 0)
            @foreach($videos as $video)
            <div class="col-lg-4">
                @include('front-end.shared.video-card')
            </div>
            @endforeach
            @else
            <div class="col-lg-4">
                <p class="alert alert-danger">Sorry No Data</p>
            </div>
            @endif
        </div>
        {!! $videos->links() !!}
    </div>
</div>
@endsection
