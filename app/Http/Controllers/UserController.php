<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\UserCreated;

class UserController extends Controller
{
    public function create(Request $request){
      $validateDate = $request->validate([
        'name' => ['required'],
        'email' => ['required']
      ]);
      $new = new User();
      $new->name = $request->input('name');
      $new->email = $request->input('email');
      $new->save();
      $lastid = $new->id;
      event(new UserCreated($lastid));
      return response()->json(['status' => 201, 'message' => 'User created successfuly']);
    }

    public function list(){
      $allusers = User::all();
      return response()->json(['status' => 200, 'data' => $allusers]);
    }
}
