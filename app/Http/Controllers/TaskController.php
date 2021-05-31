<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Task;



class TaskController extends Controller
{
    public function index()
    {
        $id = Auth::user();
        $row = DB::table('tasks')->where('user_id', $id->id)->latest()->get();
        return view('/todoList', [
            'list'=>$row
        ]);
    }

    public function create_View()
    {
        return view('tasks.create');
    }

    public function todoList()
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $values = [
            'title' => request('title'),
            'content' => request('content'),
            'user_id' => auth()->id()
        ];
        
        $todo = Task::create(
            $values
        );

        return redirect('/todoList');
    }

    public function delete($num)
    {
        $row = DB::table('tasks')->where('num', $num)->delete();

        return redirect('/todoList');
    }


    public function edit($num)
    {
        $row = DB::table('tasks')->select('num', 'title', 'content')->where('num', $num)->get();

        return view('tasks.edit', [
            'data'=>$row
        ]);
    }


    public function update($num)
    {
        $data = Task::select('title', 'content')->where('num', $num)->update([
            'title'=>request('title'),
            'content'=>request('content')
        ]);

        return redirect('/todoList');
       
    }
}
