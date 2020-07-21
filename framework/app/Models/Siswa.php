<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
  use Notifiable;

  protected $table = 'siswa';
  protected $primaryKey = 'id_siswa';
  protected $guarded = ['password', 'remember_token'];
  public $incrementing = false;

  public function kelas() {
    return $this->belongsTo('App\Models\Kelas', 'id_kelas');
  }

  public function keuanganSiswa() {
    return $this->hasMany('App\Models\Keuangan', 'id_siswa');
  }

  public function buktiPembayaran() {
    return $this->hasMany('App\Models\BuktiPembayaran', 'id_siswa');
  }

  public function nilaiSbmptn() {
    return $this->hasMany('App\Models\NilaiSbmptn', 'id_siswa');
  }

  public function nilaiTryout() {
    return $this->hasMany('App\Models\NilaiTryout', 'id_siswa');
  }

  public function nilaiHarian() {
    return $this->hasMany('App\Models\NilaiHarian', 'id_siswa');
  }

  public function jadwalBimbel() {
    return $this->hasMany('App\Models\jadwalBimbel', 'id_siswa');
  }

}
