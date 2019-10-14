                        <table class="table">
                          <thead>
                            <tr>
                                <th  style="text-align: center; vertical-align: center;">NIK</th>
                                <th  style="text-align: center; vertical-align: center;">Nama</th>
                                <th  style="text-align: center; vertical-align: center;">Ijin</th>
                                <th  style="text-align: center; vertical-align: center;">Alfa</th>
                                <th  style="text-align: center; vertical-align: center;">Cuti Luar Tanggungan</th>
                                <th  style="text-align: center; vertical-align: center;">Cuti Penting</th>
                                <th  style="text-align: center; vertical-align: center;">Dispensasi</th>
                                <th  style="text-align: center; vertical-align: center;">SDSD</th>
                                <th  style="text-align: center; vertical-align: center;">STSD</th>
                                <th  style="text-align: center; vertical-align: center;">Cuti Tahunan</th>
                                <th  style="text-align: center; vertical-align: center;">Sisa Cuti Tahunan</th>
                                <th  style="text-align: center; vertical-align: center;">Keterangan</th>
                                <th  style="text-align: center; vertical-align: center;">Keterangan Cuti</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach( $data_karyawan as $value)
                              @foreach( $data_default_presensi as $data)
                              @if($data['id_sidik_jari'] == 0)
                              @else
                                @if($data['id_sidik_jari'] == $value['id_sidik_jari'])
                                <tr>
                                  <th  style="text-align: center; vertical-align: center;">{{$value['nik']}}</th>
                                  <td  style="text-align: left; vertical-align: center;">{{$value['nama_karyawan']}}</td>
                                  <td  style="text-align: center; vertical-align: center;">{{$data['ijin']}}</td>
                                  <td  style="text-align: center; vertical-align: center;">{{$data['jumlah_absen']}}</td>
                                  <td  style="text-align: center; vertical-align: center;">{{$data['cuti_luar_tanggungan']}}</td>
                                  <td  style="text-align: center; vertical-align: center;">{{$data['cuti_penting']}}</td>
                                  <td  style="text-align: center; vertical-align: center;">{{$data['dispensasi']}}</td>
                                  <td  style="text-align: center; vertical-align: center;">{{$data['sdsd']}}</td>
                                  <td  style="text-align: center; vertical-align: center;">{{$data['stsd']}}</td>
                                  <td  style="text-align: center; vertical-align: center;">{{$data['cuti_tahunan']}}</td>
                                  <td  style="text-align: center; vertical-align: center;">{{$data['sisa_cuti_tahunan']}}</td>
                                  <td  style="text-align: center; vertical-align: center;">{{$data['keterangan']}}</td>
                                  <td  style="text-align: center; vertical-align: center;">{{$data['keterangan_cuti']}}</td>
                                </tr>
                                @endif
                              @endif
                              @endforeach
                            @endforeach
                          </tbody>
                        </table>