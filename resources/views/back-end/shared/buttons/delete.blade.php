<form action="{{ route($routeName.'.destroy', $row) }}" method="POST" style="display: inline-block; margin: 5px 0 0 0;">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-lg" data-original-title="Remove {{ $sModuleName }}">
        <i class="material-icons">close</i>
    </button>
</form>
