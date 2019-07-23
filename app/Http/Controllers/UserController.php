<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function ViewData()
    {
        // mengambil data user
        $users = User::all();
        // mengirim data user ke view user
        return view('user.user', compact('users'));
    }

    public function InputData()
    {
        return view('user.user_input');
    }

    public function SaveData(Request $request)
    {
        $this->validate($request,[
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|alpha_dash|min:6',
        ]);

        $user = new User();
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->role     = "admin";

        $user->save();
        return redirect('user');
    }

    public function DeleteData($id)
    {
        $users = Auth::User();
        if($users->role == 'superadmin'){
            User::where('id', $id)->delete();
            return redirect('user');
        }
        
    }
}
