@extends('back-end.layout.app')

<!-- To Change The Page Title -->
@section('title') {{ $pageTitle }} @endsection

@section('content')

    <!-- To Change The Page Header -->
    @component('back-end.layout._header', ['nav_title' => $pageTitle]) @endcomponent

    @component('back-end.shared.components.edit', ['pageTitle' => $pageTitle, 'pageDesc' => $pageDesc, 'routeName' => $routeName])
        <form action="{{ route($routeName.'.update', $row) }}" method="POST">
            {{ method_field('put') }}
            @include('back-end.' . $folderName . '.form')
            <div class="clearfix"></div>
        </form>
    @endcomponent

@endsection
