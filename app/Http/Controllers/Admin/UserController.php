<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::get();
        return view('admin.user.index', [
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6|max:255',
            'phone' => 'required|numeric|min:8',
        ]);

        $data = $request->all();

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->phone = $data['phone'];
        $user->password_show = $data['password'];
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User create successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);

        return view('admin.user.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if(!$user) {
            return;
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|string|min:6|max:255',
            'phone' => 'required|numeric|min:8',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->phone = $validatedData['phone'];
        $user->password_show = $validatedData['password'];
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        if(!$data) {
            return;
        }

        $data->delete();

        return redirect()->route('admin.user.index')->with('success', 'User delete successfully.');
    }
}
