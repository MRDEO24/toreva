<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['id_paket','kode','nama_orang','email','no_hp','dewasa','anak','total_harga_dewasa','total_harga_anak','check_in','check_out','total_harga','status_pembayaran','tenggat_pembayaran'];

}
