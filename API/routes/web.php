<?php

use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Admin_Message;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $tasks = Tasks::where('user_id', Auth::id())->get();
    $msgs = Admin_Message::where('status', 0)
        ->where('user_id', Auth::id())
        ->get();
    $message_count = $msgs->count();    
    return view('dashboard', compact('tasks', 'msgs', 'message_count'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('AddTask', [TaskController::class, 'addtask'])->name('task');
Route::post('AddTask', [TaskController::class, 'savetask'])->name('savetask');
Route::get('tasklist', [TaskController::class, 'tasklist'])->name('tasklist');
Route::get('tasklist/{id}', [TaskController::class, 'deletetask'])->name('deletetask');
Route::get('edittask/{id}', [TaskController::class, 'edit'])->name('edittask');
Route::put('edittask/{id}', [TaskController::class, 'update'])->name('updatetask');
Route::put('taskcomplete', [TaskController::class, 'updatestatus'])->name('updatestatus');

Route::get('sendmessage', [AdminMessageController::class, 'index'])->name('adminmessage');
Route::post('send_message', [AdminMessageController::class, 'sendmessage'])->name('send_message');

Route::get('admin-messages', [AdminMessageController::class, 'showmessages'])->name('show_msgs');
Route::get('admin-messages/{id}/{title}', [AdminMessageController::class, 'readmessage'])->name('show_msg');
Route::get('admin-messages/mark-as-all-read', [AdminMessageController::class, 'mark_as_all_read'])->name('all_read');
require __DIR__.'/auth.php';
