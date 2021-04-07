@extends('layouts.app')

@section('title', $category->name)
@section('meta_des', $category->meta_des)
@section('meta_keywords', $category->meta_keywords)

@section('content')
<div class="section section-buttons" style="min-height: 560px;">
    <div class="container">
        <div class="title">
            <h1>{{ $category->name }}</h1>
        </div>
        @include('front-end.shared.video-row')
    </div>
</div>
@endsection
