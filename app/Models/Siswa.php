<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Ortu;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswa";
    protected $fillable = ["NIS", "NISN", "nama", "Jenis_kelamin", "id_kelas", "user_id"];
    public $incrementing = false;

    public function getKelas(){
        return $this->belongsTo(Kelas::class, "id_kelas", "id");
    }

    public function getOrtu(){
        return $this->hasOne(Ortu::class, "NIS", "NIS");
    }
}
