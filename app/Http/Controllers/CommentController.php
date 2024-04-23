<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
      $comments = Comment::all(); 
      $total = Comment::count();
      return view('comments.index', compact('comments','total'));
    }
    
    public function create()
    {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {}
    /**
     * Show the form for editing the specified resource.
     */
    public function replies($comment_id)
    {
      
    }
    
    public function edit($id)
    {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect()->route('comments.index')->with('delete', 'Delete Data is successful');
    }
}
