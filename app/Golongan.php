<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'golongan';
    protected $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_golongan',
    ];

    //relasi dengan model karyawan
    public function div_karyawan()
    {
        return $this->hasOne('App\Karyawan', 'golongan_id', 'id');
    }
}
