<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Helpers\TimeHelper;

class SiteController extends Controller
{
    public function index(Request $request, $category_name = null) {
        $categories = Category::all(); 
        $postsQuery = Post::query();
        
        if ($category_name) {
            $postsQuery->whereHas('category', function($query) use ($category_name) {
                $query->where('category_name', $category_name);
            });
        }
        
        $posts = $postsQuery->get();
        
        return view("site.index", compact('posts', 'categories', 'category_name'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3',
            'comment' => 'required|min:3',
            'post_id' => 'required',
        ]);
        if (isset($request->parent_id)) {
            $validatedData['parent_id'] = $request->parent_id;
        }
        
        Comment::create($validatedData);
        return back()->with('success', 'Add Data is successful');
    }
    
    public function show($id) {
      $categories = Category::all(); 
      $post       = Post::find($id);
      $comments   = Comment::where('post_id',$id)->where('parent_id',0)->get();
      $timeHelper = new TimeHelper();
      return view("site.view-post", compact('comments','post','categories','timeHelper'));
    }
    
    public function reply($id) {
       $comment  = Comment::find($id);
       $comments = Comment::where('parent_id',$id)->get();
       $timeHelper = new TimeHelper();
       return view("site.reply", compact('comment','comments','id','timeHelper'));
    }
}
