@php
    $tanggal_sekarang = '2019-09-19';
    $data_harian      = \App\LogsData::where('DateLog', $tanggal_sekarang)->get();
    $data_karyawan    = \App\DataKaryawan::all();

    $tahun = DateTime::createFromFormat('Y-m-d',$tanggal_sekarang)->format('Y');
    $bulan   = DateTime::createFromFormat('Y-m-d',$tanggal_sekarang)->format('m');
    $tanggal   = DateTime::createFromFormat('Y-m-d',$tanggal_sekarang)->format('d');

    $data = \App\PengaturanPresensi::find(1);
        
            $default_clock_in = $data->clock_in_normal;
            $default_clock_out = $data->clock_out_normal;
            $default_transport = $data->transport_normal;

            $default_clock_in = $data->clock_in_ramadhan;
            $default_clock_out = $data->clock_out_ramadhan;
            $default_transport = $data->transport_ramadhan;
        
         $lupa_clock_in_out = $data->lupa_clock_in_out;

    if($tanggal > 20){
        $bulan_akhir = $bulan+1;
        if($bulan_akhir < 10){
              $bulan_akhir = '0'.$bulan_akhir;
        } else {
                    //Do Nothing
        }
        $tanggal_awal = $tahun.'-'.$bulan.'-21';
        $tanggal_akhir = $tahun.'-'.$bulan_akhir.'-20';
        $periode = $tanggal_awal. ' ' .$tanggal_akhir;
    } elseif( $tanggal <=20 ){
        $bulan_awal = $bulan-1;
        if($bulan_awal < 10){
              $bulan_awal = '0'.$bulan_awal;
        } else {
                    //Do Nothing
        }
        $tanggal_awal = $tahun.'-'.$bulan_awal.'-21';
        $tanggal_akhir = $tahun.'-'.$bulan.'-20';
        $periode = $tanggal_awal. ' ' .$tanggal_akhir;
    }

    $request = ([
        'dari_tanggal'  => $tanggal_awal,
        'sampai_tanggal'=> $tanggal_akhir,
    ]);

    foreach ($data_karyawan as $key => $data) {
        foreach ($data_harian as $key => $value) {
            if($data->card_id == $value->CardNumber && $data->nik == $value->SerialNumber){

            //Presensi
                $clock_in  = $value->TimeIn;
                $clock_out = $value->Timeout;

                //Input jam clock out
                if ($clock_out != null) {
                    $jam_clock_out = $clock_out;
                    $info_clock_out = null;
                } else {
                    $jam_clock_out  = '00:00:00';
                    $info_clock_out = 'Lupa clock out!';
                }

                //Input jam clock in
                if ($clock_in != null) {
                    $jam_clock_in = $clock_in;
                    $info_clock_in = null;
                } else {
                    $jam_clock_in  = '00:00:00';
                    $info_clock_in = 'Lupa clock in!';
                }

                //Input late
                if ($jam_clock_in == '00:00:00') {
                    $late = $lupa_clock_in_out;
                } else {
                    if ($jam_clock_in > $default_clock_in) {
                        $total = strtotime($jam_clock_in) - strtotime($default_clock_in);
                        $hours = floor($total / 60 / 60);
                        $minutes = floor(($total - ($hours * 60 * 60)) / 60);
                        if($minutes<10){
                            $late = $hours . '.0' . $minutes;
                        } else {
                            $late = $hours . '.' . $minutes;
                        }
                    } else {
                        $late = '0.00';
                    }
                }

                //Input Early
                if ($jam_clock_out == '00:00:00') {
                    $early = $lupa_clock_in_out;
                } else {
                    if ($jam_clock_out < $default_clock_out) {
                        $total = strtotime($default_clock_out) - strtotime($jam_clock_out);
                        $hours = floor($total / 60 / 60);
                        $minutes = floor(($total - ($hours * 60 * 60)) / 60);
                        if($minutes<10){
                            $early = $hours . '.0' . $minutes;
                        } else {
                            $early = $hours . '.' . $minutes;
                        }

                    } else {
                        $early = '0.00';
                    }
                }

                //Input Transport
                if (is_null($jam_clock_in)) {
                    $transport = null;
                } elseif($jam_clock_in == '00:00:00'){
                    $transport = null;
                } else {
                    if ($jam_clock_in < $default_transport) {
                        $transport = '1';
                    } else {
                        $transport = null;
                    }
                }

                $count = DB::table('presensi')->where([
                    ['id_sidik_jari', '=', $data->id_sidik_jari],
                    ['tanggal_presensi', '=', $tanggal_sekarang],
                ])->count();

                if($count > 0){

                    $get_data = \App\Presensi::where([
                        ['id_sidik_jari', '=', $data->id_sidik_jari],
                        ['tanggal_presensi', '=', $tanggal_sekarang],
                    ])->first();

                    $get_data->update([
                        'jam_clock_in'      => $jam_clock_in,
                        'info_clock_in'     => $info_clock_in,
                        'jam_clock_out'     => $jam_clock_out,
                        'info_clock_out'    => $info_clock_out,
                        'late_presensi'     => $late,
                        'early_presensi'    => $early,
                        'transport_presensi'=> $transport,
                    ]);

                } else {

                    \App\Presensi::create([
                        'id_sidik_jari'     => $data->id_sidik_jari,
                        'tanggal_presensi'  => $tanggal_sekarang,
                        'jam_clock_in'      => $jam_clock_in,
                        'info_clock_in'     => $info_clock_in,
                        'jam_clock_out'     => $jam_clock_out,
                        'info_clock_out'    => $info_clock_out,
                        'late_presensi'     => $late,
                        'early_presensi'    => $early,
                        'transport_presensi'=> $transport,
                    ]);

                }

            //PresensiBulan
                $count_d = DB::table('presensibulan')->where([
                    ['id_sidik_jari', '=', $data->id_sidik_jari],
                    ['periode_presensi', '=', $periode],
                ])->count();
                if($count_d > 0){

                    $get_data = \App\PresensiBulan::where([
                        ['id_sidik_jari', '=', $data->id_sidik_jari],
                        ['periode_presensi', '=', $periode],
                    ])->first();

                    $jumlah_keterlambatan = $get_data->jumlah_keterlambatan + $late + $early;

                    if($jumlah_keterlambatan < 8.00){
                        $keterangan = null;
                    }elseif($jumlah_keterlambatan > 8.00 && $jumlah_keterlambatan < 16.00 ){
                        $keterangan = '25%';
                    } elseif ($jumlah_keterlambatan > 16.00 && $jumlah_keterlambatan < 24.00 ){
                        $keterangan = '50%';
                    } elseif ($jumlah_keterlambatan > 24.00 && $jumlah_keterlambatan < 32.00 ){
                        $keterangan = '75%';
                    } elseif ($jumlah_keterlambatan > 32.00 && $jumlah_keterlambatan < 40.00 ){
                        $keterangan = '100%';
                    } elseif ($jumlah_keterlambatan > 40.00 && $jumlah_keterlambatan < 48.00 ){
                        $keterangan = '100% + 1H';
                    } elseif ($jumlah_keterlambatan > 48.00 && $jumlah_keterlambatan < 56.00 ){
                        $keterangan = '100% + 2H';
                    } elseif ($jumlah_keterlambatan > 56.00 && $jumlah_keterlambatan < 64.00  ){
                        $keterangan = '100% + 3H';
                    } elseif ($jumlah_keterlambatan > 64.00 && $jumlah_keterlambatan < 72.00  ){
                        $keterangan = '100% + 4H';
                    } elseif ($jumlah_keterlambatan > 72.00 && $jumlah_keterlambatan < 80.00  ){
                        $keterangan = '100% + 5H';
                    } elseif ($jumlah_keterlambatan > 80.00 && $jumlah_keterlambatan < 88.00  ){
                        $keterangan = '100% + 6H';
                    } else {
                        $keterangan = null;
                    }

                    $get_data->update([
                        'total_late_presensi' => $get_data->total_presensi_late + $late,
                        'total_early_presensi' => $get_data->total_presensi_early + $early,
                        'jumlah_keterlambatan' => $jumlah_keterlambatan,
                        'transport_presensi' => $get_data->transport + $transport,
                        'keterangan'        => $keterangan,
                    ]);

                } else {

                    $jumlah_keterlambatan = $late + $early;

                    if($jumlah_keterlambatan < 8.00){
                        $keterangan = null;
                    }elseif($jumlah_keterlambatan > 8.00 && $jumlah_keterlambatan < 16.00 ){
                        $keterangan = '25%';
                    } elseif ($jumlah_keterlambatan > 16.00 && $jumlah_keterlambatan < 24.00 ){
                        $keterangan = '50%';
                    } elseif ($jumlah_keterlambatan > 24.00 && $jumlah_keterlambatan < 32.00 ){
                        $keterangan = '75%';
                    } elseif ($jumlah_keterlambatan > 32.00 && $jumlah_keterlambatan < 40.00 ){
                        $keterangan = '100%';
                    } elseif ($jumlah_keterlambatan > 40.00 && $jumlah_keterlambatan < 48.00 ){
                        $keterangan = '100% + 1H';
                    } elseif ($jumlah_keterlambatan > 48.00 && $jumlah_keterlambatan < 56.00 ){
                        $keterangan = '100% + 2H';
                    } elseif ($jumlah_keterlambatan > 56.00 && $jumlah_keterlambatan < 64.00  ){
                        $keterangan = '100% + 3H';
                    } elseif ($jumlah_keterlambatan > 64.00 && $jumlah_keterlambatan < 72.00  ){
                        $keterangan = '100% + 4H';
                    } elseif ($jumlah_keterlambatan > 72.00 && $jumlah_keterlambatan < 80.00  ){
                        $keterangan = '100% + 5H';
                    } elseif ($jumlah_keterlambatan > 80.00 && $jumlah_keterlambatan < 88.00  ){
                        $keterangan = '100% + 6H';
                    } else {
                        $keterangan = null;
                    }

                    \App\PresensiBulan::create([
                        'id_sidik_jari' => $data->id_sidik_jari,
                        'periode_presensi' => $periode,
                        'total_late_presensi' => $late,
                        'total_early_presensi' => $early,
                        'jumlah_keterlambatan' => $jumlah_keterlambatan,
                        'transport_presensi' => $transport,
                        'keterangan'        => $keterangan
                    ]);  

                }                        

            }        
        }
    }

    $data_presensi  = \App\PresensiBulan::where('periode_presensi',$periode)->get();
    $data_karyawan  = \App\Datakaryawan::all();

    foreach ($data_karyawan as $data) {

        foreach ($data_presensi as $value) {

            if( $value->id_sidik_jari == $data->id_sidik_jari){

                if($value->keterangan == null){
                    $keterangan1 = null;
                    $keterangan2 = null;
                } else  {
                    $data_r = preg_split('/ \+ /', $value->keterangan);
                    $count   = count($data_r);
                    if($count > 1){
                     $keterangan1 = $data_r[0];
                     $keterangan2 = $data_r[1];
                 } else {
                     $keterangan1 = $data_r[0];
                     $keterangan2 = null;
                 }
             }

             $data_presensi_blade[] = ([
                'id_presensi'       => $value->id_presensi,
                'periode_presensi'  => $value->periode_presensi,
                'nama_karyawan'     => $data->nama_karyawan,
                'id_sidik_jari'     => $data->id_sidik_jari,
                'nik'               => $data->nik,
                'divisi'            => $data->divisi,
                'jumlah_absen' => $value->count_absen,
                'ijin'         => $value->ijin,
                'cuti_tahunan' => $value->cuti_tahunan,
                'cuti_penting' => $value->cuti_penting,
                'dispensasi'   => $value->dispensasi,
                'sdsd'         => $value->sdsd,
                'stsd'         => $value->stsd,
                'cuti_luar_tanggungan' => $value->cuti_luar_tanggungan,
                'sisa_cuti_tahunan' => $value->sisa_cuti_tahunan,
                'total_late_presensi'  => $value->total_late_presensi,
                'total_early_presensi' => $value->total_early_presensi,
                'jumlah_keterlambatan' => $value->jumlah_keterlambatan,
                'jumlah_absen'         => $value->jumlah_absen,
                'transport_presensi'   => $value->transport_presensi,
                'tambahan_presensi'    => $value->tambahan_presensi,
                'keterangan1'          => $keterangan1,
                'keterangan2'          => $keterangan2,
            ]);

         } 
     }
    }

@endphp

<table id="table1" class="table table-striped table-hover table-fw-widget">
  <thead>
    <tr>
      <th><br>NIK<br><br></th>
      <th><br>ID_SJ<br><br></th>
      <th><br>Nama<br><br></th>
      <th><br>Divisi<br><br></th>
      <th>Total<br>Late:<br>Early:<br></th>
      <th>Jumlah<br>jam<br>terlambat<br></th>
      <th>Transport<br><br><br></th>
      <th><br>TDLL<br><br></th>
      <th>Total<br>Transport<br><br></th>
      <th><br>Keterangan<br><br></th>
      <th><br>Aksi<br><br></th>
    </tr>
  </thead>
  <tbody>

    @foreach( (array) $data_presensi_blade as $data)

    @if($data['id_sidik_jari'] != 0)

    <tr class="odd gradeA">
      <td>{{$data['nik']}}</td>
      <td>{{$data['id_sidik_jari']}}</td>
      <td>{{$data['nama_karyawan']}}</td>
      <td>{{$data['divisi']}}</td>
      <td>
        {{$data['total_late_presensi']}}<br>
        {{$data['total_early_presensi']}}
      </td>
      <td>{{$data['jumlah_keterlambatan']}}</td>
      <td>{{$data['transport_presensi']}}</td>        
      <td>{{$data['tambahan_presensi']}}</td>
      <td>{{$data['transport_presensi']+$data['tambahan_presensi']}}</td>
      @if($data['keterangan1'] == null)
      <td></td>
      @elseif($data['keterangan2'] == null)
      <td>Potongan {{$data['keterangan1']}} tunjangan</td>
      @else
      <td>Potongan {{$data['keterangan1']}} tunjangan<br> + {{$data['keterangan2']}} Cuti/Disinsentif</td>
      @endif
      <td>
        <button data-toggle="modal" data-target="#rincian-data-presensi-{{$data['id_presensi']}}" type="button" class="btn btn-space btn-success">Rincian</button>
        <!-- The Modal Clock IN-->
        <div class="modal fade" id="rincian-data-presensi-{{$data['id_presensi']}}">
          <div class="modal-dialog colored-header-primary">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <table class="no-border no-strip skills">
                  <tbody class="no-border-x no-border-y">
                    <tr>
                      <td width="150px"><h4 style="color: white; margin-top: 10px;">NIK</h4></td>
                      <td width="150px"><h4 style="color: white; margin-top: 10px;">: {{$data['nik']}}</h4></td>    
                    </tr>
                    <tr>
                      <td width="150px"><h4 style="color: white; margin-top: 10px;">Nama Karyawan</h4></td>
                      <td width="150px"><h4 style="color: white; margin-top: 10px;">: {{$data['nama_karyawan']}}</h4></td>    
                    </tr>
                    <tr>
                      <td width="150px"><h4 style="color: white; margin-top: 10px;">Divisi / Jabatan</h4></td>
                      <td width="150px"><h4 style="color: white; margin-top: 10px;">: {{$data['divisi']}}</h4></td>    
                    </tr>
                  </tbody>
                </table >
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <div style="width: 100%; display: table;">
                  <div style="display: table-row">
                    <table id="table2" style="table-layout: fixed; word-wrap: break-word; word-break: break-all;" class="table table-bordered table-striped table-hover table-fw-widget">
                      <tbody>
                       <!--  Row Pengalaman Bulan Start -->
                       <tr>
                        <td><b>Izin<b></td>
                          <td>{{$data['ijin']}}</td>            
                        </tr>
                        <!--  Row Pengalaman Bulan End -->

                        <!--  Row Pengalaman Bulan Start -->
                        <tr>
                          <td><b>Alfa<b></td>
                            <td>{{$data['jumlah_absen']}}</td>            
                          </tr>
                          <!--  Row Pengalaman Bulan End -->
                          <!--  Row Gaji Pokok Start -->
                          <tr>
                            <td><b>Cuti Luar Tanggungan</b></td>
                            <td>{{$data['cuti_luar_tanggungan']}}</td>            
                          </tr>
                          <!--  Row Gaji Pokok End -->

                          <!--  Row Tunjangan Profesi Start -->
                          <tr>
                            <td><b>Cuti Penting</b></td>
                            <td>{{$data['cuti_penting']}}</td>            
                          </tr>
                          <!--  Row Tunjangan Profesi End -->

                          <!--  Row Tunjangan Jabatan Start -->
                          <tr>
                            <td ><b>Dispensasi</b></td>
                            <td>{{$data['dispensasi']}}</td>            
                          </tr>
                          <!--  Row Tunjangan Jabatan End -->

                          <!--  Row Tunjangan Kinerja Start -->
                          <tr>
                            <td ><b>SDSD</b></td>
                            <td>{{$data['sdsd']}}</td>            
                          </tr>
                          <!--  Row Tunjangan Kinerja End -->
                          <!--  Row Tunjangan Kinerja Start -->
                          <tr>
                            <td ><b>STSD</b></td>
                            <td>{{$data['stsd']}}</td>            
                          </tr>
                          <!--  Row Tunjangan Kinerja End -->
                          <!--  Row Tunjangan Kinerja Start -->
                          <tr>
                            <td ><b>Cuti Tahunan</b></td>
                            <td>{{$data['cuti_tahunan']}}</td>  
                          </tr>
                          <!--  Row Tunjangan Kinerja End -->
                          <!--  Row Tunjangan Kinerja Start -->
                          <tr>
                            <td ><b>Sisa Cuti Tahunan</b></td>
                            <td>{{$data['sisa_cuti_tahunan']}}</td>
                          </tr>
                          <!--  Row Tunjangan Kinerja End -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End The Modal Clock IN-->

          <a href="/presensi/{{$data['id_sidik_jari']}}/calendar"><button type="button" class="btn btn-space btn-success">Kalendar</button></a>
          <button data-toggle="modal" data-target="#edit-data-presensi-{{$data['id_presensi']}}" type="button" class="btn btn-space btn-warning">Edit</button>
        </td>

        <!-- The Modal Clock IN-->
        <div class="modal fade" id="edit-data-presensi-{{$data['id_presensi']}}">
          <div class="modal-dialog colored-header-primary">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>
                <h4 style="color: white; margin-top: 20px;" class="modal-title">Edit Presensi : {{$data['nama_karyawan']}}</h4>
              </div>

              <form id="form_jam_clock_in" name="submit3" action="/presensi/{{$data['id_presensi']}}/update" method="POST">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                  <div class="form-group">
                    <label for="usr">Tambahan dll. ( Format: 0 )</label><br>
                    <input value="{{$data['tambahan_presensi']}}" type="text" class="form-control" name="tambahan_presensi" id="tambahan_presensi">
                  </div><br>
                  <div class="form-group">
                    <label for="pwd">Keterangan Potongan Tunjangan (Format : 0%)</label><br>
                    <input value="{{$data['keterangan1']}}" type="text" class="form-control" name="keterangan1">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Keterangan Potongan Cuti/Disinsentif (Format : 0H)</label><br>
                    <input value="{{$data['keterangan2']}}" type="text" class="form-control" name="keterangan2">
                  </div>
                  <div class="form-group">
                    <label>Izin</label>
                    <input value="{{$data['ijin']}}" name="ijin" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Alfa</label>
                    <input value="{{$data['jumlah_absen']}}" name="alfa" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Cuti Diluar Tanggungan</label>
                    <input value="{{$data['cuti_luar_tanggungan']}}" name="cuti_luar_tanggungan" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Cuti Penting</label>
                    <input value="{{$data['cuti_penting']}}" name="cuti_penting" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Dispensasi</label>
                    <input value="{{$data['dispensasi']}}" name="dispensasi" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>SDSD (Sakit Dengan Surat Dokter)</label>
                    <input value="{{$data['sdsd']}}" name="sdsd" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>STSD (Sakit Tanpa Surat Dokter)</label>
                    <input value="{{$data['stsd']}}" name="stsd" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Cuti Tahunan</label>
                    <input value="{{$data['cuti_tahunan']}}" name="cuti_tahunan" type="text" class="form-control">
                  </div>   
                  <input value="{{$request['sampai_tanggal']}}" name="sampai_tanggal" type="hidden">
                  <input value="{{$request['dari_tanggal']}}" name="dari_tanggal" type="hidden">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button id="submit3" type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>

            </div>
          </div>
        </div>
        <!-- End The Modal Clock IN-->


      </tr>
      @endif
      @endforeach
    </tbody>
  </table>