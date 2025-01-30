<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Pembayaran;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded = [];

        public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
