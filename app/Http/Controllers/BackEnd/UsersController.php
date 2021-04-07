<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;
use App\Http\Controllers\BackEnd\BackEndController;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;

class UsersController extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
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
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $this->model->create($data);
        alert()->success('successfuly created user', 'Created Done')->persistent("Close");
        return redirect()->route('users.index');
    }


    public function update(Update $request, $id)
    {
        $row = $this->model->findOrFail($id);
        $data = $request->all();

        if(isset($data['password']) && $data['password'] != "")
        {
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }

        $row->update($data);
        alert()->success('successfuly updated user', 'Updated Done')->persistent("Close");
        return redirect()->route('users.index');
    }

}
