<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $rows = $this->model;
        $rows = $this->filter($rows);
        $with = $this->with();
        if(! empty($with))
        {
            $rows = $rows->with($with);
        }
        $rows = $rows->paginate(10);
        $routeName = $this->getClassNameFromModel();
        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $pageTitle = $moduleName;
        $pageDesc = 'Here You Can Add | Delete | Edit | Create ' . $moduleName;
        return view('back-end.' . $this->getClassNameFromModel() . '.index', compact('rows', 'moduleName', 'pageTitle', 'pageDesc', 'sModuleName', 'routeName'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $moduleName = $this->getModelName();
        $pageTitle = 'Create ' . $moduleName;
        $pageDesc = 'Here You Can Create ' . $moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();
        return view('back-end.' . $this->getClassNameFromModel() . '.create', compact('moduleName', 'pageTitle', 'pageDesc', 'folderName', 'routeName'))->with($append);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $moduleName = $this->getModelName();
        $pageTitle = 'Edit ' . $moduleName;
        $pageDesc = 'Here You Can Edit ' . $moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $row = $this->model->findOrFail($id);
        $append = $this->append();
        return view('back-end.' . $folderName . '.edit', compact('row', 'moduleName', 'pageTitle', 'pageDesc', 'folderName', 'routeName'))->with($append);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $row = $this->model->findOrFail($id)->delete();
        alert()->success('successfuly deleted ' . $sModuleName = $this->getModelName(), 'Deleted Done')->persistent("Close");
        return redirect()->back();
    }




    protected function with()
    {
        return [];
    }

    protected function append()
    {
        return [];
    }

    /**
     * To Get The View Folder Name That Mean Class.
    */
    protected function getClassNameFromModel()
    {
        return strtolower($this->pluralModelName());
    }

    protected function pluralModelName()
    {
        return str_plural($this->getModelName());
    }

    protected function getModelName()
    {
        return class_basename($this->model);
    }

    protected function filter($rows)
    {
        return $rows;
    }

}
