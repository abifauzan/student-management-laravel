<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
  protected $table = 'bukti_pembayaran';
  protected $primaryKey = 'id_bukti_pembayaran';
  protected $guarded = [];

  public function siswa() {
    return $this->belongsTo('App\Models\Siswa', 'id_siswa');
  }
}
