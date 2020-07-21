<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiTryout extends Model
{
  protected $table = 'nilai_tryout';
  protected $primaryKey = 'id_nilai_tryout';
  protected $guarded = [];
  public $timestamps = false;

  public function siswa() {
    return $this->belongsTo('App\Models\Siswa', 'id_siswa');
  }
}
