@extends('back-end.layout.app')

<!-- To Change The Page Title -->
@section('title') {{ $pageTitle }} @endsection

@section('content')
    <!-- To Change The Page Header -->
    @component('back-end.layout._header', ['nav_title' => $pageTitle]) @endcomponent


    @component('back-end.shared.components.table', ['pageTitle' => $pageTitle, 'pageDesc' => $pageDesc])
        @slot('addButton')
            <div class="col-md-4 text-right">
                <a href="{{ route($routeName.'.create') }}" class="btn btn-primary btn-round"><i class="fa fa-plus"></i> ADD {{ $sModuleName }}</a>
            </div>
        @endslot
    @endcomponent

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class=" text-primary">
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>User</th>
                <th>Category</th>
                <th>Skills</th>
                <th>Tags</th>
                <th>Published</th>
                <th class="text-center">Control</th>
            </thead>
            <tbody>
                @if(count($rows) > 0)
                @foreach($rows as $index => $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->des }}</td>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->cat->name }}</td>
                        <td>
                            @foreach($row->skills as $skill)
                                <ul>
                                    <li>{{ $skill->name }}</li>
                                </ul>
                            @endforeach
                        </td>
                        <td>
                            @foreach($row->tags as $tag)
                                <ul>
                                    <li>{{ $tag->name }}</li>
                                </ul>
                            @endforeach
                        </td>
                        <td>{{ $row->published == 1 ? 'Published' : 'Hidden' }}</td>
                        <td class="td-actions text-right">
                            @include('back-end.shared.buttons.edit')
                            @include('back-end.shared.buttons.delete')
                        </td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="10">
                            <div  class="alert alert-danger">No Recordes In Database</div>
                        </td>
                    <tr>
                @endif
            </tbody>
        </table>
        <div style="padding-left: 3px;"> {!! $rows->links() !!} </div>
    </div>

@endsection
