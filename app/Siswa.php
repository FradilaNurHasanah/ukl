<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";

    protected $fillable = [
        'nis',
        'nama_siswa',
        'kelas',
        'point'
    ];

    public function points(){
        return $this->hasMany('App\PointSiswa', 'id_siswa', 'id');
    }
}
