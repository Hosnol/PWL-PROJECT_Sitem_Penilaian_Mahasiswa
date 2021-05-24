<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswa";

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

}
