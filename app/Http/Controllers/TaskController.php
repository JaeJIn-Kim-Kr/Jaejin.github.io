<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class TaskController extends Controller
{
    public function index()
    {
        //$id = Auth::user();
        $row = DB::table('tasks')->latest()->get();
        return view('/todoList', [
            'list'=>$row
        ]);
    }



    public function create()
    {
        return view('tasks.create');
    }
}
