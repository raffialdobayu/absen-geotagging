<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ortu;
use App\Models\Siswa;
use App\Models\Presensi;

class cekAbsen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cekAbsen:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menmeriksa siswa yang tidak absen setiap jam 07:30 senin-jumat';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       try {
        //code...
         //cari siswa yang dijam 7:30 dan hari ini belum absen
        $siswa = Siswa::with("getOrtu")->get();
        foreach($siswa as $s){
            $link = route("presensi.pdf", $s->NIS);
            sendPDFByWa($s->getOrtu->No_telp, $link);
        }
       } catch (\Throwable $th) {
        throw $th;
       }
    }
}
