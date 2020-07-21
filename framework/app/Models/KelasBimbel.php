<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasBimbel extends Model
{
  protected $table = 'kelas_bimbel';
  protected $primaryKey = 'id_kelas_bimbel';
  protected $guarded = [];
  public $timestamps = false;

  public function jadwal() {
    return $this->hasMany('App\Models\JadwalBimbel', 'id_kelas_bimbel');
  }
}
