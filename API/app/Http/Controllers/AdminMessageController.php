<?php

namespace App\Http\Controllers;

use App\Models\Admin_Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMessageController extends Controller
{
    public function index()
    {
        $users = User::where('user_role', 'User')->get();
        return view('adminmessage', compact('users'));
    }
    public function sendmessage(Request $request)
    {
        if ($request->is_users == 'on') {
            $user_ids = User::where('user_role', 'User')->pluck('id')->toArray();
        } else {
            $user_ids = $request->user_ids;
        }
        foreach ($user_ids as  $user_id) {
            $msg = new Admin_Message();
            $msg->user_id = $user_id;
            $msg->admin_id = Auth::id();
            $msg->title = $request->msg_title;
            $msg->description = $request->msg_description;
            $msg->save();
        }
        return  redirect()->route('dashboard')->with('success', 'Message sent successfully');
    }
    public function showmessages(){
        $messages = Admin_Message::where('user_id', Auth::id())->get();
        return  view('message', compact('messages'));

    }
    public function readmessage($id){
        $message = Admin_Message::find($id);
        $message->status = 1;
        $message->save();
        return view('readmessage', compact('message'));

    }
    public function mark_as_all_read()
    {
        $messages = Admin_Message::where('user_id',Auth::id())->get();
        foreach ($messages as $message) {
            $message->status = 1;
            $message->save();
        }
        return redirect()->route('show_msgs');
    }
}
