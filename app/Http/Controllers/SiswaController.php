<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Ortu;
use App\Models\User;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Siswa::with(["getKelas"])->orderBy("id_kelas", "asc")->get();
        return view("dashboard.pages.siswa.index")->with(["siswa" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("dashboard.pages.siswa.create");
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $siswa = $request->only(["NIS", "NISN", "nama", "Jenis_kelamin", "id_kelas"]);
        $siswa["user_id"] = 0;
        $store = Siswa::create($siswa);
        // dd($request);
        if($store){
            
            $ortu = $request->only(["Nama", "No_telp"]);
            $ortu["NIS"] = $store->NIS;
            $ortu["user_id"] = 0;
            // dd($ortu);
            Ortu::create($ortu);

            $this->createUser($siswa, $ortu["No_telp"]);
        }
        return redirect()->back();
    }

    public function createUser($datasiswa, $no_telp){
        
        // dd($datasiswa);
        $password = Str::random(6);
        $password2 = Str::Random(6);
        User::create([
            "name" => $datasiswa["NIS"],
            "email" => $datasiswa["NIS"]."@gmail.com",
            "password" => Bcrypt($password),
            "role" => "Siswa",
            "remember_token" => str::random(60),
        ]);
        $store = User::create([
            "name" => "wali-".$datasiswa["NIS"],
            "email" => 'wali'.$datasiswa["NIS"]."@gmail.com",
            "password" => Bcrypt($password2),
            "role" => "Ortu",
            "remember_token" => str::random(60),
        ]);
        $akuninfo = [
            [
                "username" => $datasiswa["NIS"],
                "password" => $password,
            ],
            [
                "username" => "wali-".$datasiswa["NIS"],
                "password" => $password2,
            ]
        ];

        if($store){
            sendWaNotifyAccount($no_telp, $akuninfo);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        Siswa::where("NIS", $id)->first();
        return view()->with(["siswa" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $siswa = Siswa::with("getOrtu")->where("NIS", $id)->first();
        return view("dashboard.pages.siswa.edit")->with(["s" => $siswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $data = request()->except(['_token', '_method']);
        Siswa::where("NIS", $id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Siswa::where("NIS", $id)->delete();
        return redirect()->back();
    }
}
