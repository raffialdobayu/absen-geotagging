<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Mapel extends Model
{
    use HasFactory;
    protected $table = "mapel";
    protected $fillable = ["kode", "nama", "pengajar", "id_kelas", "mulai","max_absen" ,"selesai", "hari"];
    public $incrementing = false;

    public function getKelas(){
        return $this->belongsTo(Kelas::class, "id_kelas", "id");
    }
}
