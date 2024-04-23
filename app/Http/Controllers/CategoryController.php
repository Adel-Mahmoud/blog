<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
      $categories = Category::all(); 
      $total = Category::count();
      return view('categories.index', compact('categories','total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.add');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request["category_name"] as $category){
          if ( !empty($category) ) {
            Category::create([
              "category_name" => $category
            ]);
          }
        }
        return redirect()->route('categories.index')->with('success', 'Add Data is successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
      $category = Category::findOrFail($id);
      $category->category_name = $request->category_name;
      $category->save();
      return redirect()->route('categories.index')->with('update', 'updated Data is successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index')->with('delete', 'Delete Data is successful');
    }
}
