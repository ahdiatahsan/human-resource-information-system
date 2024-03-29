<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mail\NewAccountEmail;
use Illuminate\Support\Facades\Mail;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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

        //kirim data user ke email user tadi
        $new_user_email = $request->email;
        $new_user_password = $request->password;
        Mail::to($new_user_email)->send(new NewAccountEmail($new_user_email, $new_user_password));

        return redirect('user')->with('success', 'User berhasil ditambahkan ke database');
    }

    public function DeleteData($id)
    {
        $users = Auth::User();
        if($users->role == 'superadmin'){
            User::where('id', $id)->delete();
            return redirect('user')->with('danger', 'User telah dihapus dari database');
        }
    }
}
