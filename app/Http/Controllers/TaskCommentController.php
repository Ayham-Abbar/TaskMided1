<?php

namespace App\Http\Controllers;
use App\Models\TaskComments;
use Illuminate\Http\Request;

class TaskCommentController extends Controller
{
      public function addComment(Request $request){
            $comment = TaskComments::create([
              "task_id"=>$request->task_id,
              "user_id"=> $request->user_id,
              "comment"=> $request->comment,
            ]);
            return $comment;
          }
}
