<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = "pakets";
    protected $fillable = ['nama_paket','lokasi','detail','harga_dewasa','harga_anak','hari_paket','bukti'];
}