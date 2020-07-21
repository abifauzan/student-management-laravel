<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
  protected $table = 'kelas';
  protected $primaryKey = 'id_kelas';
  protected $guarded = [];
  public $timestamps = false;

  public function keuangan() {
    return $this->hasMany('App\Models\Keuangan', 'id_kelas');
  }
}
