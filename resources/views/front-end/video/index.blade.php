@extends('layouts.app')

@section('title', $video->name)
@section('meta_des', $video->meta_des)
@section('meta_keywords', $video->meta_keywords)

@section('content')
<div class="section section-buttons" style="min-height: 560px;">
    <div class="container">
        <div class="title">
            <h1>{{ $video->name }}</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                @php $url = getYoutubeId($video->youtube) @endphp
                <iframe width="100%" height="500px" src="https://www.youtube.com/embed/{{ $url }}" frameborder="0" allowfullscreen style="margin-bottom: 15px"></iframe>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <span>Created By : <a href="{{ route('front.profile', ['id' => $video->user->id, 'slug' => slug($video->user->name)]) }}">{{ $video->user->name }}</a></span>
            </div>
            <div class="col-md-4">
                <span class="text-center">Time : {{ $video->created_at->diffForHumans() }}</span>
            </div>
            <div class="col-md-4">
                <p> Category Name : <a href="{{ route('front.category', $video->cat_id) }}"> {{ $video->cat->name }} </a> </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="alert alert-info">Description</p>
                <p class="pl-2 pr-2">{{ $video->des }} </p>
            </div>
            <div class="col-md-3">
                <p class="alert alert-info">Tags</p>
                @foreach($video->tags as $tag)
                    <a href="{{ route('front.tag', $tag->id) }}" class="badge badge-pill badge-primary">{{ $tag->name }}</a>
                @endforeach
            </div>
            <div class="col-md-3">
                <p class="alert alert-info">Skills</p>
                @foreach($video->skills as $skill)
                    <a href="{{ route('front.skill', $skill->id) }}" class="badge badge-pill badge-success">{{ $skill->name }}</a>
                @endforeach
            </div>
        </div>

        @include('front-end.video.comments')

        @include('front-end.video.create_comment')

    </div>
</div>
@endsection
