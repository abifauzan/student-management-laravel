<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiSbmptn extends Model
{
  protected $table = 'nilai_sbmptn';
  protected $primaryKey = 'id_nilai_sbmptn';
  protected $guarded = [];
  public $timestamps = false;

  public function siswa() {
    return $this->belongsTo('App\Models\Siswa', 'id_siswa');
  }
}
