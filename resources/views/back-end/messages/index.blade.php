@extends('back-end.layout.app')

<!-- To Change The Page Title -->
@section('title') {{ $pageTitle }} @endsection

@section('content')
    <!-- To Change The Page Header -->
    @component('back-end.layout._header', ['nav_title' => $pageTitle]) @endcomponent


    @component('back-end.shared.components.table', ['pageTitle' => $pageTitle, 'pageDesc' => $pageDesc])

    @endcomponent

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class=" text-primary">
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Message</th>
                <th class="text-right">Control</th>
            </thead>
            <tbody>
                @if(count($rows) > 0)
                @foreach($rows as $index => $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->message }}</td>
                        <td class="td-actions text-right">
                            <a  href="{{ route($routeName.'.edit', $row) }}"
                                type="button"
                                rel="tooltip" title=""
                                class="btn btn-white btn-link btn-lg"
                                data-original-title="Replay Message">

                                <i class="fa fa-reply fa-sm" aria-hidden="true"></i>
                            </a>
                            @include('back-end.shared.buttons.delete')
                        </td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            <div  class="alert alert-danger">No Recordes In Database</div>
                        </td>
                    <tr>
                @endif
            </tbody>
        </table>
        <div style="padding-left: 3px;"> {!! $rows->links() !!} </div>
    </div>

@endsection
