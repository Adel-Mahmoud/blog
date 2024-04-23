<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
      $categories = Category::count(); 
      $posts = Post::count(); 
      $tags = Tag::count(); 
      $users = User::count(); 
      return view('dashboard',compact('categories','posts','tags','users'));
    }
}
