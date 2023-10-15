<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Admin::get();
        return view('admin.admin.index', [
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins|max:255',
            'password' => 'required|string|min:6|max:255',
        ]);

        $data = $request->all();

        $admin = new Admin();
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->password = $data['password'];
        $admin->password_show = $data['password'];
        $admin->save();

        return redirect()->route('admin.admin.index')->with('success', 'Admin create successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Admin::findOrFail($id);

        return view('admin.admin.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        if(!$admin) {
            return;
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,'.$id,
            'password' => 'required|string|min:6|max:255',
        ]);

        $admin->name = $validatedData['name'];
        $admin->email = $validatedData['email'];
        $admin->password = $validatedData['password'];
        $admin->password_show = $validatedData['password'];
        $admin->save();

        return redirect()->route('admin.admin.index')->with('success', 'Admin update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Admin::findOrFail($id);
        if(!$data) {
            return;
        }

        $data->delete();

        return redirect()->route('admin.admin.index')->with('success', 'Admin delete successfully.');
    }
}
