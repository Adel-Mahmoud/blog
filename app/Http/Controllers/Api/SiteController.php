<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    function index(Request $request, $category_name = null) {
        $categories = Category::all(); 
        $postsQuery = Post::query();
        
        if ($category_name) {
            $postsQuery->whereHas('category', function($query) use ($category_name) {
                $query->where('category_name', $category_name);
            });
        }
        
        $posts = $postsQuery->get();
        
        if ($posts == "") {
            return response()->json([
              "ok"=>false,
              "message"=>"Data Not Found",
              "data"=>""
            ],404);
        }
        return response()->json([
            "ok"=>true,
            "message"=>"Data Is Found",
            "data"=>$posts
          ]);
    }

    function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3',
            'comment' => 'required|min:3',
            'post_id' => 'required',
        ]);
        Comment::create($validatedData);
        return back()->with('success', 'Add Data is successful');
    }
    
    function show($id) {
      $categories = Category::all(); 
      $post       = Post::find($id);
      $comments       = Comment::where('post_id',$id)->get(); // where('post_id',$id);
      return view("site.view-post", compact('comments','post','categories'));
    }
}
