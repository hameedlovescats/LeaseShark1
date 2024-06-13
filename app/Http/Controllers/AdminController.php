<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.propertyoption');
    }
    public function showUsers()
    {
        $users = User::where('type', 'user')->get();
        return view('admin.userdetails',['users' => $users]);
    }

    public function updateUser($id)
    {
        $user = User::find($id);
        return view('admin.updateuser',['user' => $user]);
    }
    public function updateUserSubmit(Request $request,)
    {

        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('admin.user');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user');
    }

}
