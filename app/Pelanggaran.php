<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    protected $table = "pelanggaran";

    public function point_siswa(){
        return $this->hasMany('App\PointSiswa', 'id_pelanggaran', 'id');
    }
}
