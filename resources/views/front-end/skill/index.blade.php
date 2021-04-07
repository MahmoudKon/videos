@extends('layouts.app')

@section('title', $skill->name)

@section('content')
<div class="section section-buttons" style="min-height: 560px;">
    <div class="container">
        <div class="title">
            <h1>{{ $skill->name }}</h1>
        </div>
        @include('front-end.shared.video-row')
    </div>
</div>
@endsection
