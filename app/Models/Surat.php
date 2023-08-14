<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat';

    protected $fillable = [
        'userId',
        'pangkalan',
        'no_tlpn',
        'jenis_surat',
        'keperluan',
        'waktu',
        'lokasi', 
        'jumlah_peserta',
        'permohonan',
        'progres',
    ];

    protected  $primaryKey = 'id_surat';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
