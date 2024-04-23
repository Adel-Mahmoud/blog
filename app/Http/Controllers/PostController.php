<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $categories = Category::all(); 
      $posts = Post::all(); 
      $total = Post::count();
      return view('posts.index', compact('posts','total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all(); 
        $categories = Category::all(); 
        return view('posts.add',compact('categories','posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());
         $validatedData = $request->validate([
            'post_title' => 'required|max:255|min:3',
            'post_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'post_content' => 'required|min:3',
            'post_category_id' => 'required',
        ]);
        $validatedData["post_user_name"] = Auth::user()->name;
        if ($request->hasFile('post_picture')) {
            $imageName = time() . '.' . $request->post_picture->extension();
            $request->post_picture->move(public_path('images'), $imageName);
            $validatedData['post_picture'] = $imageName;
        }
      Post::create($validatedData);
      return redirect()->route('posts.index')->with('success', 'Add Data is successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post       = Post::find($id);
        return view('posts.edit', compact('categories','post')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'post_title' => 'required|max:255|min:3',
            'post_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'post_content' => 'required|min:3',
            'post_category_id' => 'required',
        ]);
        
        // Check if the 'post_picture' file input is not empty
        if ($request->hasFile('post_picture')) {
            // Delete the old image file
            if (file_exists(public_path('images/' . $post->post_picture))) {
                unlink(public_path('images/' . $post->post_picture));
            }
            
            // Upload the new image file
            $imageName = time() . '.' . $request->post_picture->extension();
            $request->post_picture->move(public_path('images'), $imageName);
            $validatedData['post_picture'] = $imageName;
        }
        
        // Update the post with the new data
        $post->update($validatedData);
        
        return redirect()->route('posts.index')->with('success', 'Update Data is successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index')->with('delete', 'Delete Data is successful');
    }
}
