<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Models\Tag;
use App\Http\Requests\BackEnd\Tags\Store;

class TagsController extends BackEndController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    protected function filter($rows)
    {
        if(request()->has('name') && request()->get('name') != "")
        {
            $rows = $rows->where('name', 'like', '%' . request()->get('name') . '%');
        }
        return $rows;
    }

    public function store(Store $request)
    {
        $this->model->create($request->all());
        alert()->success('successfuly created tag', 'Created Done')->persistent("Close");
        return redirect()->route('tags.index');
    }


    public function update(Store $request, $id)
    {
        $row = $this->model->findOrFail($id);
        $row->update($request->all());
        alert()->success('successfuly updated tag', 'Updated Done')->persistent("Close");
        return redirect()->route('tags.index');
    }
}
