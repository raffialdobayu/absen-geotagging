<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Siswa;
use Session;
use PDF;
use Auth;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::with(["getKelas"])->orderBy("id_kelas", "asc")->get();
        return view("dashboard.pages.presensi.index")->with(["siswa" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        //
        $data = $request->all();
        
        $data["long"] = "-6.230442908991675";
        $data["lat"] = "107.03484312165153";
        $data["tanggal"] = date("Y-m-d");
        $data["jarak"] = 0;
        $data["waktu"] = date("h:i");
        $store = Presensi::create($data);
        if ($store){
            Session::flash('berhasil', "Data Presensi Berhasil di Input!");
        }else{
            Session::flash('error', "Data Presensi Gagal Di Input!");
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Presensi::where("NIS", $id)->orderBy("kode_mapel", "desc")->get();
        return view("dashboard.pages.presensi.show")->with(["presensi" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        return view("dashboard.pages.presensi.edit")->with(["presensi" => Presensi::find($id)]);
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
        Presensi::find($id)->update($request->all());
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
    }

    public function detail($id){
        $data = Presensi::with(["getSiswa", "getMapel"])->where("id", $id)->first();
        return view("dashboard.pages.presensi.detail")->with(["data"=> $data]);
    }

    public function generatePdf($nis){
        $siswa = Siswa::where("NIS", $nis)->first();
        $data=Presensi::with(["getSiswa", "getMapel"])->where("NIS", $nis)->where("tanggal", date("Y-m-d"))->get();
        $pdfdata = [
            "siswa" => $siswa,
            "data" => $data
        ];
        // dd($pdfdata);
        $pdf = PDF::loadView('pdf.rekap', $pdfdata);
        return $pdf->download('rekap.pdf');
    }

    public function siswa(){
        $data = Presensi::where("NIS", Auth()->user()->name)->orderBy("created_at", "desc")->get();
        return view("dashboard.pages.presensi.siswa")->with(["presensi" => $data]);
    }

    public function siswapost(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        //
        $data = $request->all();
        $data["tanggal"] = date("Y-m-d");
        $data["jarak"] = hitungJarak(-6.230442908991675,107.03484312165153,$data["lat"],$data["long"]);
        if($data["jarak"] > 2.00){
            Session::flash('error', "Absen gagal anda diluar jangkauan maksimal!");
            return redirect()->back();
        }
        $data["waktu"] = date("h:i");
        $store = Presensi::create($data);
        if ($store){
            Session::flash('berhasil', "Data Presensi Berhasil di Input!");
        }else{
            Session::flash('error', "Data Presensi Gagal Di Input!");
        }
        return redirect()->back();
    }
}
