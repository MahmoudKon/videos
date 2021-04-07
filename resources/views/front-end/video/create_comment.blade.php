<div class="row">
    <div class="col-md-12">
        @if(auth()->user())
        <form action="{{ route('front.commentStore', ['id' => $video->id]) }}" method="get">
            @csrf
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Add Comment</label>
                <textarea name="comment" autocomplete="off" class="form-control @error('comment') is-invalid @enderror"></textarea>
                @error('comment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i> Add</button>
            </div>
        </form>
        @else
        <p class="alert alert-danger">to add comment, you must <a href="{{ route('login') }}" style="color: #fff;">login</a> first</p>
        @endif
    </div>
</div>
