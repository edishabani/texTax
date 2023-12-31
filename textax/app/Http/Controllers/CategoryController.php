<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index() {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }
    public function create(){
        return view('categories.create');
    }
    public function store(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect('/categories');
    }
    public function show($id){
        $category = Category::find($id);
        return view('categories.show', ['category' => $category]);
    }
    public function edit($id){
        $category = Category::find($id);
        return view('categories.edit', ['category' => $category]);
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect('/categories');
    }
    public function destroy($id){
        $category = Category::find($id);
        $category->delete();

        return redirect('/categories');
    }

}
