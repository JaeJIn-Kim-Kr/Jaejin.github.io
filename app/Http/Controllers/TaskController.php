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
        $row = DB::table('tasks')->where('user_id' , $id->id)->latest()->get();

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
            'title'     => request('title'),
            'content'   => request('content'),
            'user_id'   => auth()->id(),
            'waste_Chk' => 'N'
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
        $data = Task::select('title', 'content', 'num')->where('num', $num)->update([
            'title'=>request('title'),
            'content'=>request('content')
        ]);

        return redirect('/tasks/view/'.$num);
    }

    public function View($num)
    {
        $data = Task::select('title', 'content', 'num')->where('num', $num)->get();

        return view('tasks.view', [
            'data'=>$data
        ]);
    }

    public function complete($num)
    {
        $data = Task::select('waste_Chk')->where('num', $num)->update([
            'waste_Chk'=> 'Y'
        ]);

        return redirect('/todoList');
    }

    public function completeList()
    {
        $id = Auth::user();
        $row = DB::table('tasks')->where([
            'user_id' => $id->id,
            'waste_Chk' => 'Y'
        ])->latest()->get();

        return view('/todoList',[
            'list' => $row
        ]);
    }

    public function incompleteList()
    {
        $id = Auth::user();
        $row = DB::table('tasks')->where([
            'user_id' => $id->id,
            'waste_Chk' => 'N'
        ])->latest()->get();

        return view('/todoList',[
            'list' => $row
        ]);
    }
}
