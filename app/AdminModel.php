<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AdminModel extends Model
{
    use Notifiable;

	protected $table    = 'admin';
    protected $fillable = ['nama', 'email', 'tempat_lahir', 'tanggal_lahir', 'gender', 'alamat'];
    protected $hidden   = ['username', 'password'];
}
