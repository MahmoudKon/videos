<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\BackEnd\Videos\Store;
use App\Http\Requests\BackEnd\Videos\Update;
use App\Models\Category;
use App\Models\Video;
use App\Models\Skill;
use App\Models\Tag;
use Illuminate\Support\Facades\File;

class VideosController extends BackEndController
{
    use CommentTrait;

    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['cat', 'user'];
    }

    protected function append()
    {
        $array = [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'tags' => Tag::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
            'comments' => [],
        ];
        if(request()->route()->parameter('video')){
            $array['selectedSkills'] = $this->model->find(request()->route()->parameter('video'))->skills()->pluck('skills.id')->toArray();
            $array['selectedTags'] = $this->model->find(request()->route()->parameter('video'))->tags()->pluck('tags.id')->toArray();
            $array['comments'] = $this->model->find(request()->route()->parameter('video'))->comments()->orderBy('id', 'desc')->with('user')->get();
        }
        return $array;
    }

    protected function filter($rows)
    {
        if(request()->has('name') && request()->get('name') != "")
        {
            $rows = $rows->where('name', 'like', '%' . request()->get('name') . '%')
                        ->orWhere('email', 'like', '%' . request()->get('name') . '%')
                        ->orWhere('id', request()->get('name'));
        }
        return $rows;
    }

    public function store(Store $request)
    {
        $requestArray = $request->all() + ['user_id' => auth()->user()->id];
        $requestArray['image'] = $this->uploadImage($request);
        $row = $this->model->create($requestArray);
        $this->syncTagsSkills($row, $requestArray);
        alert()->success('successfuly created video', 'Created Done')->persistent("Close");
        return redirect()->route('videos.index');
    }

    public function update(Update $request, $id)
    {
        $row = $this->model->findOrFail($id);
        $requestArray = $request->all();

        if($request->hasFile('image'))
        {
            if($row->image != 'default.png') {
                File::delete('uploads/' . $row->image);
            }
            $requestArray['image'] = $this->uploadImage($request);
        }

        $row->update($requestArray);
        $this->syncTagsSkills($row, $requestArray);
        alert()->success('successfuly updated video', 'Updated Done')->persistent("Close");
        return redirect()->route('videos.index');
    }


    protected function syncTagsSkills($row, $requestArray)
    {
        if(isset($requestArray['skills']) && !empty($requestArray['skills'])){
            $row->skills()->sync($requestArray['skills']);
        }
        if(isset($requestArray['tags']) && !empty($requestArray['tags'])){
            $row->tags()->sync($requestArray['tags']);
        }
    }

    protected function uploadImage($request)
    {
        $file = $request->file('image');
        $fileName = time().str_random(10).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $fileName);
        return $fileName;
    }

}
