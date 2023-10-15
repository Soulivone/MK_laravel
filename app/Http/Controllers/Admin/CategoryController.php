<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Category::get();
        return view('admin.category.index', [
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $data = $request->all();

        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Category create successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Category::findOrFail($id);

        return view('admin.category.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        if(!$category) {
            return;
        }

        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category->category_name = $validatedData['category_name'];
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Category update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        if(!$data) {
            return;
        }

        $data->delete();

        return redirect()->route('admin.category.index')->with('success', 'Category delete successfully.');
    }
}
