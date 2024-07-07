<?php

namespace App\Http\Controllers;

use App\Models\ProjectComments;
use Illuminate\Http\Request;

class ProjectCommentController extends Controller
{
    public function addComment(Request $request){
        $comment = ProjectComments::create([
          "project_id"=>$request->project_id,
          "user_id"=> $request->user_id,
          "comment"=> $request->comment,
        ]);
        return $comment;
      }
}
