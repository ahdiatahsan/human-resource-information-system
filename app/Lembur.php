<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    protected $table = 'lembur';
    protected $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project', 'modul', 'tgl_lembur', 'jam_mulai', 'jam_selesai',
    ];

    //relasi dengan model karyawan
    public function get_dataKaryawan()
    {
        return $this->belongsTo('App\Karyawan', 'id_karyawan', 'id');
    }

}
