<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function create(Request $request){
      $token= $request->header("token");
      if($token){
          $projects =Projects::create([
            "name"=> $request->name,
            "description"=> $request->desc,
          ]);
          return $projects;
    }
  return "exit";
}
    
}
