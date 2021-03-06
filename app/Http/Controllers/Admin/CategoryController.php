<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return view('admin.category.index',compact('category'));
    }
    public function add()
    {
        return view('admin.category.add');
    }
    public function insert(Request $request)
    {
        $category = new Category();
        $category->name =$request->input('name');
        $category->slug =$request->input('slug');
        $category->description =$request->input('description');
        $category->status =$request->input('status') == TRUE?'1':'0';
        $category->popular =$request->input('popular') == TRUE?'1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_description');
        $category->save();
        return redirect('/categories')->with('status',"Category added");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
       
        $category->name =$request->input('name');
        $category->slug =$request->input('slug');
        $category->description =$request->input('description');
        $category->status =$request->input('status') == TRUE?'1':'0';
        $category->popular =$request->input('popular') == TRUE?'1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_description');
        $category->update();
        return redirect('/categories')->with('status',"Category updated successfully");
    }

    public function destroy($id)
    {

        $category =Category::where('id',$id)->first();

        if ($category != null) {
            $category->delete();
        return redirect('/categories')->with(['status'=> 'Category deleted successfully']);
        }

    return redirect('/categories')->with(['status'=> 'Wrong ID']);

     
    }
}
