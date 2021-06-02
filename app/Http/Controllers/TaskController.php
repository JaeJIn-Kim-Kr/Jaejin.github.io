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
        $row = DB::table('tasks')->where('user_id' , $id->id)->get();

        return view('/todoList', [
            'list'=>$row
        ]);
    }

    public function create_View()
    {
        return view('tasks.create');
    }

    public function todoList(Request $request)
    {
        $task_File = request()->file('task_File');

        $fileName = $task_File->getClientOriginalName();
        $filePath = "/uploads/" . date("Y") . '/' . date("m");

        $latestNum = DB::table('tasks')->select('num')->orderBy('num', "DESC")->take(1)->get();
        $task_File->storeAs($filePath, $fileName);

        // 실제 파일명
        //return request()->file('task_File')->getClientOriginalName();

        // 확장자명
        //return request()->file('task_File')->getClientOriginalExtension();
        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $values = [
            'title'         => request('title'),
            'content'       => request('content'),
            'user_id'       => auth()->id(),
            'progress_Chk'  => 'N',
            'waste_Chk'     => 'N',
            'file_Name'     => $fileName,
            'file_Path'     => $filePath,
            'reg_Date'      => now()
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
            'title'     =>request('title'),
            'content'   =>request('content'),
            'mod_Date'  =>now()
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
            'progress_Chk'  => 'F',
            'mod_Date'      => now(),
            'complete_Date' => now()
        ]);

        return redirect('/todoList');
    }

    public function completeList()
    {
        $id = Auth::user();
        $row = DB::table('tasks')->where([
            'user_id' => $id->id,
            'progress_Chk' => 'F'
        ])->get();

        return view('/todoList',[
            'list' => $row
        ]);
    }

    public function incompleteList()
    {
        $id = Auth::user();
        $row = DB::table('tasks')->where([
            'user_id' => $id->id,
            'progress_Chk' => 'N'
        ])->get();

        return view('/todoList',[
            'list' => $row
        ]);
    }
}
