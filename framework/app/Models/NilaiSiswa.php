<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
  protected $table = 'nilai_siswa';
  protected $primaryKey = 'id_nilai_siswa';
  protected $guarded = [];
  public $timestamps = false;

  public function siswa() {
    return $this->belongsTo('App\Models\Siswa', 'id_siswa');
  }

}
