<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    function create(Request $req)
    {
        $req->validate([
            'name' => 'required|max:30'
        ]);

        $category = new Category();
        $category->name = $req->input('name');
        $category->save();

        $req->session()->flash('success', 'Category name '.$category->name.' created successfully');

        return redirect()->route('moderator.categories.create');
    }
    function all()
    {
        return category::all();
    }
/* -------------------------------------------------------------------------- */
/*            --------------------- API -----------------------           */
/* -------------------------------------------------------------------------- */
    ///---------API Get all Categories
    public function apiall(){
        return category::all();
    }
    ///---------API Create
    function apicreate(Request $req)
    {
        $req->validate([
            'name' => 'required|max:30'
        ]);

        $category = new Category();
        $category->name = $req->input('name');
        $category->save();
    }
    /// ---------API Get Categories By ID
    public function apiCatById($id){
        return category::where('id',$id)->first();
    }
    ///---------API PUT Categories By ID
    public function apiPutCatById($id, Request $req){
        $category = category::where('id',$id)->first();
        $category->name = $req->input('name');
        $category->update();
    }
    ///---------API DELETE Categories By ID
    function apiDeleteCatById($id)
    {
        Category::where('id', $id)->delete();
    }



    function delete($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('moderator.categories');

    }
    function edit(Request $req)
    {
        $category = Category::where('id', $req->input('id'))->first();
        $category->name = $req->input('name');
        $category->update();

        return redirect()->route('moderator.categories');
    }
    function searchJSON($keyword)
    {
        $category = Category::query()->whereLike('name', $keyword);
        return json_encode($category);
    }
}
