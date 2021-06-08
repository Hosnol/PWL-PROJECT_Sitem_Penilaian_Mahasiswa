<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Dosen extends Model
{
    use HasFactory;

    protected $table = "dosen";

    protected $fillable = ['nip','nama','jk','nohp','email','alamat', 'gambar'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
