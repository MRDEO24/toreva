<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $table='gambar_paket';
    protected $fillable=['image_name','path','id_paket'];
}
