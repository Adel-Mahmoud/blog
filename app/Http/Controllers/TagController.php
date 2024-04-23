<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tags.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.add');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request["tag_name"] as $tag){
          if ( !empty($tag) ) {
            Tag::create([
              "tag_name" => $tag
            ]);
          }
        }
        return redirect()->route('tags.index')->with('success', 'Add Data is successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit', compact('tag')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
      $tag = Tag::findOrFail($id);
      $tag->tag_name = $request->tag_name;
      $tag->save();
      return redirect()->route('tags.index')->with('update', 'updated Data is successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        return redirect()->route('tags.index')->with('delete', 'Delete Data is successful');
    }
}
