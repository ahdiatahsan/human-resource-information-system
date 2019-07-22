<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisi';
    protected $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_divisi',
    ];

    //relasi dengan model karyawan
    public function gol_karyawan()
    {
        return $this->hasOne('App\Karyawan', 'divisi_id', 'id');
    }
}
