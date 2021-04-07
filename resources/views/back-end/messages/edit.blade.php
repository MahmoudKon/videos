@extends('back-end.layout.app')

<!-- To Change The Page Title -->
@section('title') {{ $pageTitle }} @endsection

@section('content')

    <!-- To Change The Page Header -->
    @component('back-end.layout._header', ['nav_title' => $pageTitle]) @endcomponent

    @component('back-end.shared.components.edit', ['pageTitle' => $pageTitle, 'pageDesc' => $pageDesc, 'routeName' => $routeName])
            @include('back-end.' . $folderName . '.form')
    @endcomponent

@endsection
