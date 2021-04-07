<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Models\Skill;
use App\Http\Requests\BackEnd\Skills\Store;

class SkillsController extends BackEndController
{

    public function __construct(Skill $model)
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
        alert()->success('successfuly created skill', 'Created Done')->persistent("Close");
        return redirect()->route('skills.index');
    }


    public function update(Store $request, $id)
    {
        $row = $this->model->findOrFail($id);
        $row->update($request->all());
        alert()->success('successfuly updated skill', 'Updated Done')->persistent("Close");
        return redirect()->route('skills.index');
    }
}
