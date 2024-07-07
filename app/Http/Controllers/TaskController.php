<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Task;
use App\Models\User;
use App\Models\User_Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
   public function send(Request $request){
      $user=User::find($request->id);
      Mail::to($user->email)->send(new MailNotify($user));
      return "okkkkk";
   }

   public function confirm($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $user->update([
            'id'=>$user->id,
            'email'=>$user->email,
            'password'=>$user->password,
            'is_confirmed' => true,
        ]);

        return response()->json(['message' => 'Your subscription has been confirmed.']);
   }
    public function addTask(Request $request){
       $task=Task::create([
        "user_id"=>$request->user_id ,
        "project_id"=>$request->project_id,
        "title"=>$request->title,
        "description"=>$request->description,
        "status"=>"in queue",
        "due_date"=>$request->date,
       ]);
     $user = User_Project::create([
         "project_id" => $task->project_id,
         "user_id" =>$task->user_id,
         "role" => "user",
     ]);
     $user = User::find($request->user_id);
     $user->assignRole("user");
     return $user;
    }
    public function editTask(Request $request){
       $task=Task::find($request->id);
       $update_task=$task->update([
        "user_id"=>$task->user_id,
        "project_id"=>$task->project_id,
        "title"=>$task->title,
        "description"=>$task->description,
        "status"=>$request->status,
        "due_date"=>$task->date,
       ]);
       return $update_task;
    }
   //  public function send(Request $request)
   //  {
   //      $user = User_Project::create([
   //          "project_id" => $request->project_id,
   //          "user_id" => $request->user_id,
   //          "role" => "user",
   //      ]);
   //      $user = User::find($request->user_id);
   //      $user->assignRole("user");
   //      return $user;
   //  }
}
