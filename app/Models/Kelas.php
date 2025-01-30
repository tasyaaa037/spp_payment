<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
