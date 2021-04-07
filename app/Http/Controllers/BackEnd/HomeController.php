<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends BackEndController
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $comments = Comment::with('user', 'video')->orderBy('id', 'desc')->take(10)->get();
        return view("back-end.home", compact('comments'));
    }
}
