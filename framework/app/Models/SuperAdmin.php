<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperAdmin extends Authenticatable
{
  use Notifiable;
  
  protected $guard = 'admin';

  protected $table = 'superadmin';
  protected $primaryKey = 'id_superadmin';
  protected $guarded = ['password', 'remember_token'];
}
