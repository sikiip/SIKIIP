<?php

namespace App\Exports;

use App\DataKaryawan;
use App\DefaultPresensi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DefaultPresensiExport implements FromView
{

	 public function view(): View
    {
        return view('Presensi.table_rekap_presensi', [
            'data_karyawan'		 		  => DataKaryawan::all(),
            'data_default_presensi' 	  => DefaultPresensi::all(),
        ]);
    }
}
