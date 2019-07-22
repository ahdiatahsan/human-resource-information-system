<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('karyawan', compact('karyawans'));
    }

    public function InputData()
    {
        $golongans = Golongan::all();
        $divisis = Divisi::all();
        return view('karyawan_input', compact('golongans', 'divisis'));
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

        return redirect('karyawan');
    }

    public function DeleteData($id)
    {
        $user = Auth::user();
        if ($user->role != 'karyawan') {
            User::where('id', $id)->where('role', 'karyawan')->delete();
        }
        return redirect('karyawan');
    }

    public function EditData($id)
    {
        $karyawan = Karyawan::find($id);
        $golongans = Golongan::all();
        $divisis = Divisi::all();
        return view('karyawan_edit', compact('karyawan', 'golongans', 'divisis'));
    }

    public function UpdateData(Request $request, $id)
    {
        $this->validate($request,[
            'nama'      => 'required',
            'alamat'    => 'required',
            'golongan'  => 'required',
            'divisi'    => 'required',
        ]);

        $user = Auth::user();
        $karyawan = Karyawan::find($id);
        $nip = $request->nip;

        if ($user->role == 'karyawan') {
            if ($karyawan->user_id === $user->id) {
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

            } else {
                return redirect('karyawan');
            }

        } else {

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

        }
        
        $karyawan->save();
        return redirect('karyawan');
    }
}
