<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    use Notifiable;

    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $guarded = ['password', 'remember_token'];

}
