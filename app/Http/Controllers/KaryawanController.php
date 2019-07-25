<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mail\NewAccountEmail;
use Illuminate\Support\Facades\Mail;

use App\Karyawan;
use App\User;
use App\Golongan;
use App\Divisi;

class KaryawanController extends Controller
{
    public function ViewData()
    {
        // mengambil data karyawan
        $karyawans = karyawan::all();
        $emailKaryawan = karyawan::with('get_dataUser')->get();
        $golonganKaryawan = karyawan::with('get_dataGolongan')->get();
        $divisiemailKaryawan = karyawan::with('get_dataDivisi')->get();
        // mengirim data karyawan ke view karyawan
        return view('karyawan.karyawan', compact('karyawans'));
    }

    public function InputData()
    {
        $golongans = Golongan::all();
        $divisis = Divisi::all();
        return view('karyawan.karyawan_input', compact('golongans', 'divisis'));
    }

    public function SaveData(Request $request)
    {
        $this->validate($request,[
            'nama'     => 'required',
            'nip'      => 'required|numeric|unique:karyawan',
            'alamat'   => 'required',
            'golongan' => 'required',
            'divisi'   => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|alpha_dash|min:6',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'karyawan';

        if($user->save()) {
            $karyawan = new Karyawan();
            $karyawan->nama     = $request->nama;
            $karyawan->nip      = $request->nip;
            $karyawan->alamat   = $request->alamat;
            $karyawan->golongan_id = $request->golongan;
            $karyawan->divisi_id   = $request->divisi;
            $karyawan->user_id  = $user->id;
            $karyawan->save();            
        }
        
        //kirim data user ke email user tadi
        $new_user_email = $request->email;
        $new_user_password = $request->password;
        Mail::to($new_user_email)->send(new NewAccountEmail($new_user_password));
        
        return redirect('karyawan')->with('success', 'Data karyawan berhasil ditambahkan ke database');
    }

    public function DeleteData($id)
    {
        $user = Auth::user();
        if ($user->role != 'karyawan') {
            User::where('id', $id)->where('role', 'karyawan')->delete();
        }
        return redirect('karyawan')->with('danger', 'Data karyawan telah dihapus dari database');
    }

    public function EditData($id)
    {
        $karyawan = Karyawan::find($id);
        $golongans = Golongan::all();
        $divisis = Divisi::all();
        return view('karyawan.karyawan_edit', compact('karyawan', 'golongans', 'divisis'));
    }

    public function UpdateData(Request $request, $id)
    {
        $this->validate($request,[
            'nama'      => 'required',
            'alamat'    => 'required',
            'golongan'  => 'required',
            'divisi'    => 'required',
        ]);

        $karyawan = Karyawan::find($id);
        $nip = $request->nip;

        if($karyawan->nip == $nip) {
            $karyawan->nama        = $request->nama;
            $karyawan->alamat      = $request->alamat;
            $karyawan->golongan_id = $request->golongan;
            $karyawan->divisi_id   = $request->divisi;
        }
        else {
            if($nip) {
                $this->validate($request,[
                    'nip' => 'required|unique:karyawan',
                ]);
                    
                $karyawan->nama        = $request->nama;
                $karyawan->nip         = $request->nip;
                $karyawan->alamat      = $request->alamat;
                $karyawan->golongan_id = $request->golongan;
                 $karyawan->divisi_id   = $request->divisi;
            } 
        }
        
        $karyawan->save();
        return redirect('karyawan')->with('success', 'Data karyawan berhasil disunting');
    }
}
