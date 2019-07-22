<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'nip', 'alamat', 'golongan', 'divisi',
    ];

    //relasi dengan model User
    public function get_dataUser()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    //relasi dengan model lembur
    public function get_dataLembur()
    {
        return $this->hasMany('App\Lembur', 'id_karyawan', 'id');
    }

    //relasi dengan model Golongan
    public function get_dataGolongan()
    {
        return $this->belongsTo('App\Golongan', 'golongan_id', 'id');
    }

    //relasi dengan model Divisi
    public function get_dataDivisi()
    {
        return $this->belongsTo('App\Divisi', 'divisi_id', 'id');
    }
}
