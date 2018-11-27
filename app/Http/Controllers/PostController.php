<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class PostController extends Controller
{
  public function __construct()
     {
         return $this->middleware('auth');
     }
     public function index()
    {
        $posts = Post::all();

        return view('index', compact('posts'));
    }
    public function show($id)
    {
        $post = Post::find($id);

        return view('show', compact('post'));
    }
     public function create()
     {
         return view('post');
     }

     public function store(Request $request)
     {
         $post =  new Post();
         $post->user_id = auth()->user()->id;
         $post->image = $request->get('image');
         $post->title = $request->get('title');
         $post->body = $request->get('body');

         $post->save();

         return redirect('posts');

     }
}
