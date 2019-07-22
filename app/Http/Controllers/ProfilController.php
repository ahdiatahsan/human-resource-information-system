<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Karyawan;
use App\User;

class ProfilController extends Controller
{
    public function ViewData()
    {
        $user = Auth::user();
        // mengambil data karyawan
        $profil = karyawan::where('user_id', $user->id)->get();
        // mengirim data karyawan ke view karyawan
        return view('profil', compact('profil', 'user'));
    }

    public function EditData()
    {
        $user = Auth::user();
        // mengambil data karyawan dan mengirim ke view edit profil
        $profil = karyawan::where('user_id', $user->id)->get();
        if ($profil) {
            return view('profil_edit', compact('profil', 'user'));
        }
        else {
            // kembali ke home jika false
            return view('home');
        }
    }

    public function EditDataProfil(Request $request, $id)
    {
        $users = Auth::user();
        if ($users->role != 'karyawan') {

            $user = User::find($id);
            $email    = $request->email;

            if($user->email == $email) {
                $password = $request->password;
                if($password) {
                    $this->validate($request,[
                        'password' => 'required|confirmed|alpha_dash|min:6',
                    ]);
                    $user->password = bcrypt($request->password);
                } 
                $user->save();
            } else {
                $email    = $request->email;
                $password = $request->password;

                if($email) {
                    $this->validate($request,[
                        'email'    => 'email|unique:users',
                    ]);
                    $user->email = $request->email;
                }
                
                if($password) {
                    $this->validate($request,[
                        'password' => 'required|confirmed|alpha_dash|min:6',
                    ]);
                    
                    $user->password = bcrypt($request->password);
                }

                $user->save();
            }

        } else {

            $this->validate($request,[
                'nama'   => 'required',
                'alamat' => 'required',
            ]);

            $user = User::find($id);
            $email    = $request->email;

            if($user->email == $email) {
                $password = $request->password;
                if($password) {
                    $this->validate($request,[
                        'password' => 'required|confirmed|alpha_dash|min:6',
                    ]);
                    $user->password = bcrypt($request->password);
                } 
                $user->save();
            } else {
                $email    = $request->email;
                $password = $request->password;

                if($email) {
                    $this->validate($request,[
                        'email'    => 'email|unique:users',
                    ]);
                    $user->email = $request->email;
                }
                
                if($password) {
                    $this->validate($request,[
                        'password' => 'required|confirmed|alpha_dash|min:6',
                    ]);
                    
                    $user->password = bcrypt($request->password);
                }

                $user->save();
            }

            $user_login = Auth::user();
            $karyawan = Karyawan::where('user_id', $user_login->id)->first();
            $karyawan->nama     = $request->nama;
            $karyawan->alamat   = $request->alamat;
            $karyawan->save();
        }
        
            return redirect('profil');
    }
}