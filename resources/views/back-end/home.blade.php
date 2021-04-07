@extends('back-end.layout.app')
<!-- To Change The Page Title -->
@section('title')
Home
@endsection

<!-- Start New CSS Style -->
@push('css')
<style>

</style>
@endpush
<!-- End New CSS Style -->

@section('content')
<!-- To Change The Page Header -->
@component('back-end.layout._header', ['nav_title' => 'Home Page']) @endcomponent

<div class="container-fluid">

    @include('back-end.home-sections.tables-data-count')

    <div class="row">
        @include('back-end.home-sections.comments-section')
    </div>

</div>

@endsection

<!-- Start New JS Code -->
@push('js')
<script>

</script>
@endpush
<!-- End New JS Code -->
