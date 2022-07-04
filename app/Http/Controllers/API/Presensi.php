<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Presensi as presensiModel;
use App\Models\Mapel;

class Presensi extends Controller
{
    //
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        //
        $data = $request->all();
        $data["tanggal"] = date("Y-m-d");
        $data["jarak"] = hitungJarak(-6.230442908991675,107.03484312165153, $request->lat, $request->long);
        $presensi = Mapel::select("max_absen")->where("kode", $data["kode_mapel"])->first();
        $data["waktu"] = date("h:i");

        if(strtotime($data["waktu"]) < strtotime($presensi->max_absen)){
            return ResponseFormatter::error("Batas Waktu Absen Sudah Lewat",null,404);
        }

        if($data["jarak"] > 2.00 ){
            return ResponseFormatter::error("Anda Berada Diluar radius maksimal",null,404);
        }

        
        
        try{
            $store = PresensiModel::create($data);
            return ResponseFormatter::success("Berhasil Presensi",$store);
        }catch(Exception $e){
           return ResponseFormatter::error(e,null,404);
        }
        
    }
}
