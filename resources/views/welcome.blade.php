@extends('layouts.app')

@section('title', 'home')

@section('content')

    @include('front-end.homePage-sections.banner')

    @include('front-end.homePage-sections.videos')

    @include('front-end.homePage-sections.statics')

    @include('front-end.homePage-sections.contact')

@endsection
