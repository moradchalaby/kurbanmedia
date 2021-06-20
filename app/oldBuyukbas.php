<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyukbas extends Model
{
    //
    protected $fillable = ['id', 'sira_no', 'kesilme_no', 'gun', 'hisse_no', 'saat', 'adi_soyadi', 'tel_no', 'referans', 'vekalet_durum', 'kayit_log', 'kesilme_durum', 'arama_islem', 'video_islem', 'islem_log'];
}