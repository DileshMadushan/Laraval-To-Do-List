<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function addtask() {
        return view ('AddTask');
    }
    public function savetask(Request $request) {
        $task = new Tasks();
        $task->user_id=Auth::id();
        $task->title = $request->title;
        $task->description = $request->Desc;
        $task->save();
        return view ('dashboard');
    }
    public function tasklist(){
        $list = Tasks::where ('user_id',Auth::id())->get();
        return view ('tasklist',compact('list'));
    }
    public function deletetask($id){
        $id = request()->id;    
        Tasks::where('id',$id)->delete();
        return redirect()->back();

    }
    
}
