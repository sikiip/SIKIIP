                        <table class="table">
                          <thead>
                            <tr>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">NIK</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Nama</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Divisi</th>
                              <th colspan="2" style="text-align: center; vertical-align: center;">Pengalaman (bln)</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Gaji Pokok</th>  
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Tunjangan Profesi 2019</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Tunjangan Jabatan 2019</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Tunjangan Kinerja 2019</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Tunjangan Khusus 2019</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Tunjangan Transportasi 2019</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Tunjangan Hari Transport</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Besaran Tunjangan Transport 2019</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Basic Gaji Perhitungan BPJS Kesehatan</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Basic Gaji Perhitungan BPJS Ketenagakerjaan</th>
                              <th colspan="2" style="text-align: center; vertical-align: center;">BPJS Kesehatan</th>
                              <th colspan="3" style="text-align: center; vertical-align: center;">BPJS Ketenagakerjaan</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Insentif</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Bonus</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Disinsentif</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Total Gaji 2019</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Masa Kerja</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Gaji Setahun</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Iuran</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Biaya Jabatan</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Gaji Setelah Pengurangan Biaya Jabatan dan JHT</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Status</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">PTKP</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">PKP/th</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">TP</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">NPWP</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">TP Real</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">PPh 21 Gaji</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Potongan</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Potongan BPJS</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Dibayar</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">No. Rekening</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Nama Bank</th>                 
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Keterangan Potongan</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Keterangan Presensi</th>
                              <th rowspan="2" style="text-align: center; vertical-align: center;">Keterangan Disinsentif</th>
                            </tr>
                            <tr>

                              <th style="text-align: center; vertical-align: center;">Tanggal</th>
                              <th style="text-align: center; vertical-align: center;">Jumlah</th>  
                              
                              <th style="text-align: center; vertical-align: center;">Perusahaan</th>
                              <th style="text-align: center; vertical-align: center;">Karyawan</th>
                              <th style="text-align: center; vertical-align: center;">JKK</th>
                              <th style="text-align: center; vertical-align: center;">JKM</th>
                              <th style="text-align: center; vertical-align: center;">JHT</th>

                            </tr>
                          </thead>
                          <tbody>
                            @foreach( $data_gaji_blade as $data)
                            
                            <tr>
                              <td style="width: 10px;">{{$data['nik']}}</td>
                              <td style="width: 10px;">{{$data['nama_karyawan']}}</td>
                              <td style="width: 10px;">{{$data['divisi']}}</td>
                              <td style="text-align: center;">{{$data['pengalaman_tanggal']}}</td>
                              <td style="text-align: center;">{{$data['pengalaman_bulan']}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['gaji_pokok'],2,",",".")}}</td>  
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['T_profesi'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['T_jabatan'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['T_kinerja'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['T_khusus'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['T_transport'],2,",",".")}}</td>
                              <td style="text-align: center;">{{$data['hari_transportasi']}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['besaran_tunjangan_transport'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['basic_gaji_perhitungan_bpjs_kesehatan'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['basic_gaji_perhitungan_bpjs_ketenagakerjaan'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['bpjs_kesehatan_perusahaan'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['bpjs_kesehatan_karyawan'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['bpjs_ketenagakerjaan_JKK'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['bpjs_ketenagakerjaan_JKM'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['bpjs_ketenagakerjaan_JHT'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['insentif'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['bonus'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['disinsentif'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['total_gaji'],2,",",".")}}</td>
                              <td style="text-align: center;">{{$data['masa_kerja']}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['gaji_setahun'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['iuran_JHT_karyawan'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['biaya_jabatan'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['gaji_setelah_pengurangan_biaya_jabatan_JHT'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">{{$data['status']}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['ptkp'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['pkp_th'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">{{$data['tp']}}</td>
                              <td style="text-align: center;width: 10px;">{{$data['npwp']}}</td>
                              <td style="text-align: center;width: 10px;">{{$data['tp_real']}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['pph_21'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['potongan'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['potongan_BPJS'],2,",",".")}}</td>                 
                              <td style="text-align: center;width: 10px;">Rp {{number_format($data['dibayar'],2,",",".")}}</td>
                              <td style="text-align: center;width: 10px;">{{$data['no_rek']}}</td>
                              <td style="text-align: center;width: 10px;">{{$data['nama_bank']}}</td>
                              <td style="width: 20px;">{{$data['keterangan_potongan']}}</td>

                              <td style="width: 50px;">
                                @foreach($data_presensi as $presensi)
                                @if($data['id_sidik_jari'] == $presensi['id_sidik_jari'])
                                @if($presensi['keterangan_presensi'] == null)
                                @else
                                {{DateTime::createFromFormat('Y-m-d',$presensi['tanggal_presensi'])->format('d').':'.$presensi['keterangan_presensi']}};
                                @endif
                                @endif
                                @endforeach
                                @if($data['keterangan_tunjangan_transport'] == null)
                                @else
                                {{$data['keterangan_tunjangan_transport']}} Hari Datang diatas {{$data['default_jam_transport']}}
                                @endif
                              </td>
                              @if($data['keterangan_tunjangan_transport'] == null)
                              <td></td>
                              @elseif($data['keterangan_disinsentif_insentif'] == null)
                              <td style="width: 50px;">Akumulasi Jumlah Keterlambatan : {{$data['jumlah_keterlambatan']}}</td>
                              @else
                              <td style="width: 50px;">Akumulasi Jumlah Keterlambatan : {{$data['jumlah_keterlambatan']}}<br>
                                {{$data['keterangan_disinsentif_insentif']}}
                              </td>
                              @endif
                            </tr>
                            @endforeach
                          </tbody>
                        </table>