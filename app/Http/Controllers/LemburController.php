<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lembur;
use App\Karyawan;

class LemburController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function ViewData()
    {
        $user = Auth::user();
        $karyawan = Karyawan::where('user_id', $user->id)->first();
        // mengambil data lembur
        if ($user->role == 'karyawan') {
            $lemburs =  Lembur::with('get_dataKaryawan')->where('id_karyawan', $karyawan->id)->get();
        } else {
            $lemburs = Lembur::all();
        }
        return view('lembur.lembur', compact('lemburs'));
        
    }

    public function InputData()
    {
        return view('lembur.lembur_input');
    }

    public function SaveData(Request $request)
    {
        $this->validate($request,[
            'project'     => 'required',
            'modul'       => 'required',
            'tgl_lembur'  => 'required|date|after:yesterday',
            'jam_mulai'   => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
        ]);
        
        $user = Auth::user();
        $karyawan = Karyawan::where('user_id', $user->id)->first();

        $lembur = new Lembur();
        $lembur->id_karyawan = $karyawan->id;
        $lembur->project     = $request->project;
        $lembur->modul       = $request->modul;
        $lembur->tgl_lembur  = $request->tgl_lembur;
        $lembur->jam_mulai   = $request->jam_mulai;
        $lembur->jam_selesai = $request->jam_selesai;
        $lembur->status      = "pending";

        $lembur->save();
        return redirect('lembur')->with('success', 'Data lembur berhasil ditambahkan ke database');
    }

    public function EditData($id)
    {
        $user = Auth::user();
        $lembur = Lembur::find($id);
        $karyawan = Karyawan::where('user_id', $user->id)->first();
        if ($user->role == 'karyawan') {
            if ($karyawan->id === $lembur->id_karyawan) {
                return view('lembur.lembur_edit', compact('lembur'));
            } else {
                return redirect('lembur')->with('danger', 'Anda tidak memiliki hak untuk menyunting data tersebut');
            }
        } else {
            return view('lembur.lembur_edit', compact('lembur'));
        }
    }

    public function UpdateData(Request $request, $id)
    {
        $this->validate($request,[
            'project'     => 'required',
            'modul'       => 'required',
            'tgl_lembur'  => 'required|date',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required',
        ]);

        $user = Auth::user();
        $lembur = Lembur::find($id);
        $karyawan = Karyawan::where('user_id', $user->id)->first();
        
        if ($user->role == 'karyawan') {
            if ($karyawan->id === $lembur->id_karyawan) {
                $lembur->project     = $request->project;
                $lembur->modul       = $request->modul;
                $lembur->tgl_lembur  = $request->tgl_lembur;
                $lembur->jam_mulai   = $request->jam_mulai;
                $lembur->jam_selesai = $request->jam_selesai;
            } else {
                return redirect('lembur')->with('danger', 'Anda tidak memiliki hak untuk menyunting data tersebut');
            }
        } else {
            $lembur->project     = $request->project;
            $lembur->modul       = $request->modul;
            $lembur->tgl_lembur  = $request->tgl_lembur;
            $lembur->jam_mulai   = $request->jam_mulai;
            $lembur->jam_selesai = $request->jam_selesai;
        }
        
        $lembur->save();
        return redirect('lembur')->with('success', 'Data lembur berhasil disunting');
    }

    public function DeleteData($id)
    {
        $user = Auth::user();
        $karyawan = Karyawan::where('user_id', $user->id)->first();
        if ($user->role != 'karyawan') {
            Lembur::where('id', $id)->delete();
        } else {
            Lembur::where('id', $id)->where('status', 'like', '%pending%')->where('id_karyawan', $karyawan->id)->delete();
        }
        return redirect('lembur')->with('danger', 'Data lembur telah dihapus dari database');
    }

    public function KonfirmasiData($id)
    {
        $user = Auth::user();
        $data = Lembur::where('id', $id)->first();
        if ($user->role != 'karyawan') {
            $data->status = 'diterima';
            $data->save();
        }
        return redirect('lembur')->with('info', 'Data lembur dikonfirmasi');
    }
}
