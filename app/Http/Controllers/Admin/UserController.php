<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users=User::all();
        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('admin/users')->with('success', 'User Berhasil di Hapus');
    }
}
