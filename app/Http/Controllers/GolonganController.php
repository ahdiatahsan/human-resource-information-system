<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Golongan;

class GolonganController extends Controller
{
    public function ViewData()
    {
        // mengambil data golongan
        $golongans = Golongan::all();
        // mengirim data golongan ke view golongan
        return view('golongan', compact('golongans'));
    }

    public function InputData()
    {
        return view('golongan_input');
    }

    public function SaveData(Request $request)
    {
        $this->validate($request,[
            'nama_golongan'     => 'required|unique:golongan',
        ]);
        
        $golongan = new Golongan();
        $golongan->nama_golongan = $request->nama_golongan;

        $golongan->save();
        return redirect('golongan');
    }

    public function EditData($id)
    {
        $golongan = Golongan::find($id);
        return view('golongan_edit', compact('golongan'));
    }

    public function UpdateData(Request $request, $id)
    {
        $golongan = Golongan::find($id);
        
        if ($golongan->nama_golongan === $request->nama_golongan) {
            $this->validate($request, ['nama_golongan' => 'required|unique:golongan',]);
            $golongan->nama_golongan = $request->nama_golongan;
        } else {
            $this->validate($request, ['nama_golongan' => 'required',]);
            $golongan->nama_golongan = $request->nama_golongan;
        }
        
        $golongan->save();
        return redirect('golongan');
    }

    public function DeleteData($id)
    {
        Golongan::where('id', $id)->delete();
        return redirect('golongan');
    }
}