<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Models\Category;
use App\Http\Requests\BackEnd\Categories\Store;

class CategoriesController extends BackEndController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    protected function filter($rows)
    {
        if(request()->has('name') && request()->get('name') != "")
        {
            $rows = $rows->where('name', 'like', '%' . request()->get('name') . '%')
                        ->orWhere('meta_keywords', 'like', '%' . request()->get('name') . '%')
                        ->orWhere('meta_des', 'like', '%' . request()->get('name') . '%');
        }
        return $rows;
    }

    public function store(Store $request)
    {
        $this->model->create($request->all());
        alert()->success('successfuly created category', 'Created Done')->persistent("Close");
        return redirect()->route('categories.index');
    }


    public function update(Store $request, $id)
    {
        $row = $this->model->findOrFail($id);
        $row->update($request->all());
        alert()->success('successfuly updated category', 'Updated Done')->persistent("Close");
        return redirect()->route('categories.index');
    }
}
