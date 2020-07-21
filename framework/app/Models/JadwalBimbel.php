<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalBimbel extends Model
{
  protected $table = 'jadwal_bimbel';
  protected $primaryKey = 'id_jadwal_bimbel';
  protected $guarded = [];
  public $timestamps = false;

  public function siswa() {
    return $this->belongsTo('App\Models\Siswa', 'id_siswa');
  }

  public function kelasBimbel() {
    return $this->belongsTo('App\Models\KelasBimbel', 'id_kelas_bimbel');
  }

}
