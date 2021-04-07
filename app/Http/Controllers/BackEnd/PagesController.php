<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\BackEnd\Pages\Store;
use App\Models\Page;

class PagesController extends BackEndController
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    protected function filter($rows)
    {
        if(request()->has('name') && request()->get('name') != "")
        {
            $rows = $rows->where('name', 'like', '%' . request()->get('name') . '%')
                        ->orWhere('des', 'like', '%' . request()->get('name') . '%');
        }
        return $rows;
    }

    public function store(Store $request)
    {
        $this->model->create($request->all());
        alert()->success('successfuly created page', 'Created Done')->persistent("Close");
        return redirect()->route('pages.index');
    }


    public function update(Store $request, $id)
    {
        $row = $this->model->findOrFail($id);
        $row->update($request->all());
        alert()->success('successfuly updated page', 'Updated Done')->persistent("Close");
        return redirect()->route('pages.index');
    }
}
