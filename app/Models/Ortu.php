<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    use HasFactory;
    protected $table = "ortu";
    protected $fillable = ["NIS", "Nama", "No_telp", "user_id"];
}
