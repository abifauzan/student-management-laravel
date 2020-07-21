<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
  protected $table = 'keuangan';
  protected $primaryKey = 'id_keuangan';
  protected $guarded = [];

  public function siswa() {
    return $this->belongsTo('App\Models\Siswa', 'id_siswa');
  }

  public function kelas() {
    return $this->belongsTo('App\Models\Kelas', 'id_kelas');
  }
}
