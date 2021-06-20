<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Matakuliah;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';

    public $timestamps = false;

    public function kelas()
    {
       return $this->belongsTo(Kelas::class);
    }

    public function dosen(){
        return $this->belongsTo(Dosen::class);
    }

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class);
    }
}
