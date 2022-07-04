<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Mapel;

class Presensi extends Model
{
    use HasFactory;
    protected $table = "presensi";
    protected $fillable = ["NIS", "kode_mapel", "long", "lat", "waktu", "desc", "jarak", "status", "tanggal"];
    

    public function getSiswa(){
        return $this->belongsTo(Siswa::class, "NIS", "NIS");
    }

    public function getMapel(){
        return $this->belongsTo(Mapel::class, "kode_mapel", "kode");
    }


    
}
