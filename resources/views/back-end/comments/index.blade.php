<table class="table" id="comments">
    <tbody>
        @if(count($comments) > 0)
            @foreach($comments as $comment)
                <tr class="test">
                    <td>
                        <span>{{ $comment->user->name }} <small class="float-right">{{ $comment->created_at }}</small></span>
                        <p>{{ $comment->comment }}</p>
                    </td>
                    <td class="td-actions text-right">
                        <button rel="tooltip" title="" onclick="$(this).closest('tr').next('tr').fadeToggle(200).siblings('.formEdit').fadeOut(200)" class="btn btn-white btn-link btn-sm btnEdit" data-original-title="Edit Comment">
                            <i class="material-icons">edit</i>
                        </button>
                        <a href="{{ route('comments.delete', $comment) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove Comment">
                            <i class="material-icons">close</i>
                        </a>
                    </td>
                </tr>
                <tr class="formEdit" style="display: none;">
                    <td colspan="4">
                        <form action="{{ route('comments.update', ['id' => $comment->id]) }}" method="post">
                            <input type="hidden" value="{{ $row->id }}" name="video_id">
                            @include('back-end.comments.form')
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Edit Comment</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4"><div class="alert alert-danger">No Comments</div></td>
            </tr>
        @endif
    </tbody>
</table>
