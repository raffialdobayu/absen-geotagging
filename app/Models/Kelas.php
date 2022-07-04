<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mapel;
use App\Models\Siswa;
class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $fillable = ["kelas","wali_kelas",];

    public function getJadwal(){
        return $this->hasMany(Mapel::class, "id_kelas", "id");
    }
    public function getSiswa(){
        return $this->hasMany(Siswa::class, "id_kelas", "id");
    }
    
}
