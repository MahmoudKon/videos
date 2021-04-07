<div class="row" id="comments">
    <div class="col-md-12">
        <p class="alert alert-info">Comments ( {{ count($video->comments) }} )</p>
        @foreach($video->comments as $comment)
        <div class="card" id="comment_{{ $comment->id }}" style="border: 1px solid #ccc;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('front.profile', ['id' => $comment->user->id, 'slug' => slug($comment->user->name)]) }}" class="card-title"> <i class="nc-icon nc-chat-33"></i> {{ $comment->user->name }}</a>
                    </div>
                    <div class="col-md-4">
                        <small class="card-title"> <i class="nc-icon nc-calendar-60"></i> {{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    @if (auth()->user())
                    @if ($comment->user_id == auth()->user()->id || auth()->user()->group == 'admin')
                    <div class="col-md-4 text-right">
                        <button class="btn btn-danger btn-sm btn-just-icon" onclick="$('.formEdit').slideUp(300);$(this).closest('.row').next('form').slideToggle(300)">
                            <i class="fa fa-edit"></i>
                        </button>
                    </div>
                    @endif
                    @endif
                    <div class="col-md-7">
                        <p class="card-text">{{ $comment->comment }}</p>
                    </div>
                </div>
                <form class="formEdit" style="display: none;" action="{{ route('front.commentUpdate', ['id' => $comment->id]) }}" method="post">
                    @csrf
                    <textarea name="comment" autocomplete="off" class="form-control @error('comment') is-invalid @enderror">{{ $comment->comment }}</textarea>
                    @error('comment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="text-center mt-2">
                        <button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
