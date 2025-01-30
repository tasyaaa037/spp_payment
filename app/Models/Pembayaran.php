<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Siswa;
use App\Models\Spp;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

        public function spp()
    {
        return $this->belongsTo(Spp::class);
    }
}
