<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class AdminController extends Controller
{
  public function __construct()
     {
         return $this->middleware('role:admin');
     }
     public function ShowUserlist(){
       $users = User::all();
       return view('profile', compact('users'));
   }
   public function Edit(){
     return;
   }
}
