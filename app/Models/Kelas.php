<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\Jadwal;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';

    protected $fillable =['nama_kelas'];

    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

}
