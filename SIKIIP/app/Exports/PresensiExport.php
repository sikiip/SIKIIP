<?php

namespace App\Exports;

use App\Presensi;
use App\DataKaryawan;
use App\PresensiBulan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PresensiExport implements FromView
{

	protected $periode;
	protected $tanggal_awal;
	protected $tanggal_akhir;

	 function __construct($periode) {
	 	$data_tanggal = preg_split('/ +/', $periode);
	 	//dd($data_tanggal);

        $this->periode = $periode;
        $this->tanggal_awal  = $data_tanggal[0];
        $this->tanggal_akhir = $data_tanggal[1];
        //dd($this->tanggal_awal);
 	}

	 public function view(): View
    {
        return view('Presensi.table_presensi', [
            'data_presensi_blade' => PresensiBulan::where('periode_presensi',$this->periode)->get(),
            'data_karyawan'		  => DataKaryawan::all(),
            'data_presensi' 	  => Presensi::whereBetween('tanggal_presensi', [$this->tanggal_awal, $this->tanggal_akhir])->get(),
        ]);
    }
}
