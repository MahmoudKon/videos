<form action="{{ route('comments.store') }}" method="post">
    <input type="hidden" value="{{ $row->id }}" name="video_id">
    @include('back-end.comments.form')

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </div>
</form>
