<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Divisi;

class DivisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function ViewData()
    {
        // mengambil data divisi
        $divisis = Divisi::all();
        // mengirim data divisi ke view divisi
        return view('divisi.divisi', compact('divisis'));
    }

    public function InputData()
    {
        return view('divisi.divisi_input');
    }

    public function SaveData(Request $request)
    {
        $this->validate($request,[
            'nama_divisi'     => 'required|unique:divisi',
        ]);
        
        $divisi = new Divisi();
        $divisi->nama_divisi = $request->nama_divisi;

        $divisi->save();
        return redirect('divisi')->with('success', 'Data divisi berhasil ditambahkan ke database');
    }

    public function EditData($id)
    {
        $divisi = Divisi::find($id);
        return view('divisi.divisi_edit', compact('divisi'));
    }

    public function UpdateData(Request $request, $id)
    {
        $divisi = Divisi::find($id);
        
        if ($divisi->nama_divisi === $request->nama_divisi) {
            $this->validate($request, ['nama_divisi' => 'required|unique:divisi',]);
            $divisi->nama_divisi = $request->nama_divisi;
        } else {
            $this->validate($request, ['nama_divisi' => 'required',]);
            $divisi->nama_divisi = $request->nama_divisi;
        }
        
        $divisi->save();
        return redirect('divisi')->with('success', 'Data divisi berhasil disunting');
    }

    public function DeleteData($id)
    {
        Divisi::where('id', $id)->delete();
        return redirect('divisi')->with('danger', 'Data divisi telah dihapus dari database');
    }
}
