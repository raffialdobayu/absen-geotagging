<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\AbsensiController;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Ortu;
use App\Models\Presensi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $siswa = Siswa::with(["getOrtu"])->get();
//     // dd($siswa[0]);
//         foreach($siswa as $s){
//             $link = route("presensi.pdf", $s->NIS);
//             sendPDFByWa($s->getOrtu->No_telp, $link);
//         }
//     return view('welcome');
    
//     $siswa = Siswa::where("NIS", Auth()->user()->name)->first();
//     return dd(date("l"));
//     return dd(Mapel::where("id_kelas", $siswa->id_kelas)->where("hari", date("l"))->get());
// });
Route::middleware(["auth", "checkRole:Admin"])->group(function(){
    Route::resource("siswa", SiswaController::class);
    Route::resource("auth", AuthController::class);
    Route::resource("kelas", KelasController::class);
    Route::resource("mapel", MapelController::class);
    Route::resource("presensi", AbsensiController::class);
    Route::get("/presensi/{id}/detail", [AbsensiController::class, "detail"])->name("presensi.detail");
    // Route::get("/{model}/{field}/{id}/destroy", function($model, $field, $id){
    //     $model::where($field, $id)->delete();
    //     return redirect()->back();
    // });
    // Route::put("/{model}/{field}/update", function($model, $field, Request $req){
    //     $model::where($field, $req->NIS)->update($req->all());
    //     return redirect()->back();
    // })->name("update");

});

Route::middleware(["auth", "checkRole:Siswa"])->group(function(){
    
});
    Route::get("/presensi/siswa/page", [AbsensiController::class, "siswa"])->name("presensi.siswa.index");
    Route::post("/presensi/siswa/page", [AbsensiController::class, "siswapost"])->name("presensi.siswa.post");

Route::get("/presensi/{nis}/pdf", [AbsensiController::class, "generatePDF"])->name("presensi.pdf");
// ? Route Authentikasi 

Route::post("/login/post", [AuthController::Class, "postLogin"])->name("login.post");
Route::get("/logout", [AuthController::Class, "Logout"])->name("logout");
Route::get("/login", [AuthController::Class, "index"])->name("login");
Route::get("/login/siswa", [AuthController::Class, "siswa"])->name("login");
Route::post("/admin/login/post", [AuthController::Class, "adminPostLogin"])->name("login.admin.post");

