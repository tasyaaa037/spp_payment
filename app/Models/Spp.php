<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;

    protected $table = 'spp';
    protected $primaryKey = 'id_spp';

    protected $fillable = [
        'nominal',
        'tahun',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_spp');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_spp');
    }
}
