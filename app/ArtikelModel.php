<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ArtikelModel extends Model
{
    use Notifiable;

	protected $table    = 'artikel';
    protected $fillable = ['judul', 'keterangan', 'kategori'];
}
