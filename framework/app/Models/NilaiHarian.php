<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiHarian extends Model
{
  protected $table = 'nilai_harian';
  protected $primaryKey = 'id_nilai_harian';
  protected $guarded = [];
  public $timestamps = false;

  public function siswa() {
    return $this->belongsTo('App\Models\Siswa', 'id_siswa');
  }

}
