<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_Project;
use Illuminate\Http\Request;

class User_ProjectController extends Controller
{
    //تحديد مشرف مشروع
    public function selectManeger(Request $request)
    {
        $maneger = User_Project::create([
            "project_id" => $request->project_id,
            "user_id" => $request->user_id,
            "role" => "maneger",
        ]);
        $user = User::find($request->user_id);
        $user->assignRole("project manager");
        return $maneger;
    }


    //اضافة مستخدمين على المشروع
//    public function send(Request $request)
//     {
//         $user = User_Project::create([
//             "project_id" => $request->project_id,
//             "user_id" => $request->user_id,
//             "role" => "user",
//         ]);
//         $user = User::find($request->user_id);
//         $user->assignRole("user");
//         return $user;
//     }
}
