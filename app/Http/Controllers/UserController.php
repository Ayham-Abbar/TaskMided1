<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function __consruct()
   {
   }
   public function create(Request $request)
   {
      
      $user = User::create([
         "name" => $request->name,
         "email" => $request->email,
         "password" => $request->password,
         "status"=> $request->status,
      ]);
         $user->assignRole($request->status);
      return "Successfully";
   }
   public function add(Request $request)
   {
      $user = User::find($request->id);
      $user->assignRole($request->role);
      return "successfully...";
   }
   public function index(Request $request)
   {
      $id = $request->id;
      $user = User::find($id);
      if ($user->hasRole("admin")) {
         return $user->getAllPermissions();
      } elseif ($user->hasRole("project manager")) {
         return $user->getAllPermissions();
      } elseif ($user->hasRole("user")) {
         return $user->getAllPermissions();
      } else {
         echo 'Error...';
      }
   }
   public function login(Request $request)
   {
      $request->validate([
         'email' => 'required|email|max: 255',
         'password' => 'required|string|min:3',
         'device_name' => 'string|max: 255',
      ]);
      $user = User::where('email', $request->email)->first();
      if ($user &&  $request->password == $user->password) {
         $device_name = $request->post('device_name', $request->userAgent());
         $token = $user->createToken($device_name);
         $user->update([
            "Token"=> $token,
        ]);
         return response()->json([
            'code' => 1,
            'token' => $token->plainTextToken,
            'user' => $user,
         ], 201);
      }
      return response()->json([
         'code' => 0,
         'message' => 'Invalid credentials',
      ], 401);
   }
   public function showRole(Request $request){
        $user= User::where('id', $request->id)->first();
        return $user->getRoleNames();
   }
}
