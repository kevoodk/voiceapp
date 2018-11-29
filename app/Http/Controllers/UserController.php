<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Post;

class UserController extends Controller
{
    //
    public function profile(){
      $userId = auth()->user()->id;
      $findPosts = Post::where("user_id", "=", $userId)->get();

      return view('/userprofile', compact('findPosts'), array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){
          $userId = auth()->user()->id;
          $findPosts = Post::where("user_id", "=", $userId)->get();
        if($request->hasFile('avatar')){
          $avatar = $request->file('avatar');
          $filename = time() . '.' . $avatar->getClientOriginalExtension();
          Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ));

          $user = Auth::user();
          $user->avatar = $filename;
          $user->save();
        }

        return view('/userprofile', compact('findPosts'), array('user' => Auth::user()) );
    }
}
