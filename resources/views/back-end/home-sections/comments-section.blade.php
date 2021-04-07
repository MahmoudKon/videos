<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Latest Comments</h4>
            <p class="card-category">Here you can see the latest comments in website</p>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                    <tr>
                        <th width="7%">ID</th>
                        <th width="15%">Name</th>
                        <th width="15%">Video</th>
                        <th width="38%">Comment</th>
                        <th width="15%">Date</th>
                        <th width="10%">Control</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>
                            <a href="{{ route('users.edit', ['id' => $comment->user->id]) }}">
                                {{ $comment->user->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('videos.edit', ['id' => $comment->video->id]) }}">
                                {{ $comment->video->name }}
                            </a>
                        </td>
                        <td>{{ $comment->comment }}</td>
                        <td>{{ $comment->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('comments.delete', $comment) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove Comment">
                                <i class="material-icons">close</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
