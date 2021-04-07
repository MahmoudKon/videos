@extends('back-end.layout.app')

<!-- To Change The Page Title -->
@section('title') {{ $pageTitle }} @endsection

@section('content')

    <!-- To Change The Page Header -->
    @component('back-end.layout._header', ['nav_title' => $pageTitle]) @endcomponent

    @component('back-end.shared.components.edit', ['pageTitle' => $pageTitle, 'pageDesc' => $pageDesc, 'routeName' => $routeName])
        <form action="{{ route($routeName.'.update', $row) }}" method="POST" enctype="multipart/form-data">
            {{ method_field('put') }}
            @include('back-end.' . $folderName . '.form')
        </form>

        @slot('video')
            @php $url = getYoutubeId($row->youtube) @endphp
            @if($url)
                <iframe width="100%" src="https://www.youtube.com/embed/{{ $url }}" frameborder="0" allowfullscreen style="margin-bottom: 15px"></iframe>
            @else
                <div class="alert alert-danger">No Video</div>
            @endif
            <hr class="mt-2 mb-2">
            <img src="{{ url('uploads/'.$row->image) }}" width="100%" class="pt-3 pb-3">
        @endslot
    @endcomponent

    @component('back-end.shared.components.edit', ['pageTitle' => 'Edit Comment', 'pageDesc' => 'Here We Can Edit Comments', 'routeName' => $routeName])

        @include('back-end.comments.index')

        @slot('video')
            @include('back-end.comments.create')
        @endslot

    @endcomponent

@endsection
