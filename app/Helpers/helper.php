
<?php 
    use Illuminate\Support\Facades\Http;
    use App\Models\Kelas;
    use App\Models\Siswa;
    use App\Models\Mapel;
    use GuzzleHttp\Client;

    function hitungJarak($lat_pusat, $long_pusat, $lat_sekarang, $long_sekarang, $unit="km", $desimal=2){
        $derajat = rad2deg(acos((sin(deg2rad($lat_pusat))*sin(deg2rad($lat_sekarang))) + (cos(deg2rad($lat_pusat))*cos(deg2rad($lat_sekarang))*cos(deg2rad($long_pusat-$long_sekarang)))));
        switch($unit) {
            case 'km':
             $jarak = $derajat * 111.13384; // 1 derajat = 111.13384 km, berdasarkan diameter rata-rata bumi (12,735 km)
             break;
            case 'mi':
             $jarak = $derajat * 69.05482; // 1 derajat = 69.05482 miles(mil), berdasarkan diameter rata-rata bumi (7,913.1 miles)
             break;
            case 'nmi':
             $jarak =  $derajat * 59.97662; // 1 derajat = 59.97662 nautic miles(mil laut), berdasarkan diameter rata-rata bumi (6,876.3 nautical miles)
           }
        return round($jarak, $desimal);
        
    }

   function getKelas(){
    return Kelas::orderBy("kelas", "asc")->get();
   }

   function getSiswa(){
    return Siswa::orderBy("NIS", "asc")->get();
   }

   function getMapel(){
    return Mapel::all();
   }

   function getMapelByKelas($NIS){
    $siswa = Siswa::where("NIS", $NIS)->first();
    return Mapel::where("id_kelas", $siswa->id_kelas)->get();
   }
   function getMapelByKelasAndDay($NIS){
    $siswa = Siswa::where("NIS", $NIS)->first();
    return Mapel::where("id_kelas", $siswa->id_kelas)->where("hari", date("l"))->get();
   }

   function buat_id($inisial, $digit, $model, $field = "id"){
    $data = $model::select($field)->orderBy($field, "desc")->get();
    if (count($data) > 0){
        $inisial =  substr($data[0]->$field, 0, strlen($inisial));
        // dd($inisial);
        $uid = (int)substr($data[0]->$field, strlen($inisial));
        
        // concate inisial dan uid
        $id = $inisial.str_pad((int)++$uid, $digit, '0', STR_PAD_LEFT);        
        return $id;
    }else {
        // generate string angka sesuai panjang yang di tentukan
        $id = $inisial.str_pad(1, $digit, '0', STR_PAD_LEFT);
        return $id;
    }
}

function sendWaNotifyAccount($no_telp, $data){
    // $response = Http::withOptions(['verify' => false])->withHeaders([
    //     'Authorization' => 'aBQoScSKu5xUUyMCvgfD',
    // ])->asForm()->post('https://md.fonnte.com/api/send_message.php', [
        
    //         'phone' => $no_telp,
    //         'type' => 'text',
    //         'text' => 'test notify akun',
        
    // ]);
    $response = Http::withOptions(['verify' => false])->withHeaders([
        'Authorization' => 'aBQoScSKu5xUUyMCvgfD',
    ])->asForm()->post('https://md.fonnte.com/api/send_message.php', [
        'phone' => $no_telp,
        'type' => 'text',
        'text' => 'Pemberitahuan Informasi Akun Siswa Dan Wali Murid Untuk Sistem Informasi Presensi Kehadiran Siswa Pada SMKN6 Kota Bekasi. Demikian Informasi Yang Kami Sampaikan, Terimakasih.
        Akun Siswa
        Username : '. $data[0]["username"] 
        .'
        Password: '.$data[0]["password"]
        .'
        Akun Wali Murid
        Username : '. $data[1]["username"] 
        .'
        Password: '.$data[1]["password"],
        'delay' => '1',
        'schedule' => '0'
    ]);

    
}

function sendPDFByWa($no_telp, $link){

    // aBQoScSKu5xUUyMCvgfD

    $response = Http::withHeaders([
        'Authorization' => 'aBQoScSKu5xUUyMCvgfD',
    ])->asForm()->post('https://md.fonnte.com/api/send_message.php', [
        'phone' => $no_telp,
        'type' => 'text',
        'text' => 'Pemberitahuan Rekap Presensi Harian Siswa, Silahkan Download Pada Link : '.$link,
    ]);

    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    // CURLOPT_URL => "https://md.fonnte.com/api/send_message.php",
    // CURLOPT_RETURNTRANSFER => true,
    // CURLOPT_ENCODING => "",
    // CURLOPT_MAXREDIRS => 10,
    // CURLOPT_TIMEOUT => 0,
    // CURLOPT_FOLLOWLOCATION => true,
    // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    // CURLOPT_CUSTOMREQUEST => "GET",
    // CURLOPT_POSTFIELDS => array(
    //     'phone' => $no_telp,
    //     'type' => 'text',
    //     'text' => 'Pemberitahuan bahwa status presensi siswa dengan NIS 1234 dan Nama A adalah ALPHA. Terima Kasih',
    //     'delay' => '1',
    //     'schedule' => '0'),
    // CURLOPT_HTTPHEADER => array(
    //     "Authorization:aBQoScSKu5xUUyMCvgfD"
    // ),
    // ));

    // $response = curl_exec($curl);


    // curl_close($curl);
    // echo $response;
    // sleep(1);

}



?>