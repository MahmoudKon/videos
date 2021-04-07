<?php
namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Comments\Store;
use App\Models\Comment;

trait CommentTrait
{
    public function commentStore(Store $request)
    {
        $requestArray = $request->all() + ['user_id' => auth()->user()->id];
        $row = Comment::create($requestArray);
        alert()->success('successfuly added comment', 'Added Done')->persistent("Close");
        return redirect()->route('videos.edit', ['id' => $row->video_id, '#comments']);
    }

    public function commentDelete($id)
    {
        $row = Comment::findOrFail($id);
        $row->delete();
        alert()->success('successfuly deleted comment', 'Deleted Done')->persistent("Close");
        return redirect()->route('videos.edit', ['id' => $row->video_id, '#comments']);
    }

    public function commentUpdate(Store $request, $id)
    {
        $row = Comment::findOrFail($id);
        $row->update($request->all());
        alert()->success('successfuly updated comment', 'Updated Done')->persistent("Close");
        return redirect()->route('videos.edit', ['id' => $row->video_id, '#comments']);
    }
}
