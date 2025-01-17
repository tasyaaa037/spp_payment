<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';

    protected $fillable = [
        'username',
        'password',
        'nama_petugas',
        'level',
    ];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_petugas');
    }
}
