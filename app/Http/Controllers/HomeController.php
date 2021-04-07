<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontEnd\Comments\Store;
use App\Http\Requests\FrontEnd\Messages\Store as MsgStore;
use App\Http\Requests\FrontEnd\Users\Store as UserStore;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use App\Models\Message;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['commentUpdate', 'commentStore', 'profileUpdate']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $videos = Video::published()->orderBy('id', 'desc')->paginate(9);
        $VideosCount = Video::published()->count();
        // $CommentsCount = Comment::whereHas('video', function($q){ return $q->published(); })->count();
        $CommentsCount = Comment::whereHas('video', function($q){ return $q->published(); })->count();
        $TagsCount = Tag::whereHas('videos', function($q){ return $q->published(); })->count();
        return view('welcome', compact('videos', 'VideosCount', 'CommentsCount', 'TagsCount'));
    }

    public function index()
    {
        $videos = Video::published()->orderBy('id', 'desc');
        if(request()->has('search') && request()->get('search') != '')
        {
            $videos = $videos->where('name', 'like', '%' . request()->get('search') . '%');
        }
        $videos = $videos->paginate(21);
        return view('home', compact('videos'));
    }

    public function category($id)
    {
        $category = Category::findOrFail($id);
        $videos = Video::published()->where('cat_id', $id)->orderBy('id', 'desc')->paginate(21);
        return view('front-end.category.index', compact('videos', 'category'));
    }

    public function skill($id)
    {
        $skill = Skill::findOrFail($id);
        $videos = Video::published()->whereHas('skills', function($q) use($id){
            $q->where('skill_id', $id);
        })->orderBy('id', 'desc')->paginate(21);
        return view('front-end.skill.index', compact('videos', 'skill'));
    }

    public function tag($id)
    {
        $tag = Tag::findOrFail($id);
        $videos = Video::published()->whereHas('tags', function($q) use($id){
            $q->where('tag_id', $id);
        })->orderBy('id', 'desc')->paginate(21);
        return view('front-end.tag.index', compact('videos', 'tag'));
    }

    public function video($id)
    {
        $video = Video::published()->with('skills', 'tags', 'cat', 'user', 'comments.user')->findOrFail($id);
        return view('front-end.video.index', compact('video'));
    }

    public function commentStore(Store $request, $id)
    {
        $video = Video::published()->findOrFail($id);
            Comment::create([
                'comment' => $request->comment,
                'video_id' => $id,
                'user_id' => auth()->user()->id,
            ]);
            alert()->success('your comment has been added', 'Done');
        return redirect(route('front.video', [$video->id, '#comment_'.$video->comments->last()->id]));
    }

    public function commentUpdate(Store $request, $id)
    {
        $comment = Comment::findOrFail($id);
        if($comment->user_id == auth()->user()->id || auth()->user()->group == 'admin')
        {
            $comment->update(['comment' => $request->comment]);
            alert()->success('your comment is changed', 'Done');
        }
        alert()->error('we did not found this comment', 'Done');
        return redirect(route('front.video', [$comment->video_id, '#comment_'.$comment->id]));
    }

    public function messageStore(MsgStore $request)
    {
        Message::create($request->all());
        alert()->success('your message is sended', 'Done');
        return redirect()->back();
    }

    public function page($id, $slug = null)
    {
        $page = Page::findOrFail($id);
        return view('front-end.pages.index', compact('page'));
    }

    public function profile($id, $slug = null)
    {
        $user = User::findOrFail($id);
        return view('front-end.profile.index', compact('user'));
    }

    public function profileUpdate(UserStore $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $data = $request->all();

        if(isset($data['password']) && $data['password'] != "")
        {
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }

        $user->update($data);
        alert()->success('your profile has been updated', 'Done');
        return redirect()->route('front.profile', ['id' => $user->id, 'slug' => slug($user->name)]);
    }
}
