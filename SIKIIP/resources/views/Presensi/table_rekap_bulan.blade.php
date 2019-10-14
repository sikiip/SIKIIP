                        <table class="table">
                          <thead>
                            <tr>
                                <th  style="text-align: center; vertical-align: center;">NIK/th>
                                <th  style="text-align: center; vertical-align: center;">Nama</th>
                                <th  style="text-align: center; vertical-align: center;">Divisi</th>
                                <th  style="text-align: center; vertical-align: center;">Keterangan Presensi</th>
                                <th  style="text-align: center; vertical-align: center;">Keterangan Potongan</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach( $data_presensi_blade as $value)
                              @foreach( $data_karyawan as $data)
                                @if($data['id_sidik_jari'] == $value['id_sidik_jari'])
                                <tr>
                                    <td style="vertical-align: center;">{{$data['nik']}}</td>
                                    <td style="vertical-align: center;">{{$data['nama_karyawan']}}</td>
                                    <td style="vertical-align: center;">{{$data['divisi']}}</td>
                                    <td style="vertical-align: center;">
                                    @foreach($data_presensi as $presensi)
                                      @if($data['id_sidik_jari'] == $presensi['id_sidik_jari'])
                                        @if($presensi['keterangan_presensi'] == null)
                                        @else
                                          {{DateTime::createFromFormat('Y-m-d',$presensi['tanggal_presensi'])->format('d').':'.$presensi['keterangan_presensi']}};
                                        @endif
                                      @endif
                                    @endforeach
                                    {{$value['transport_presensi']}} hari transport
                                    </td>
                                    <td style="vertical-align: center;">
                                      @if($value['keterangan'] == null)
                                      @else
                                          Potongan {{$value['keterangan']}} Tunjangan/Cuti/Disinsentif
                                      @endif
                                  </td>
                                </tr>
                                @endif
                              @endforeach
                            @endforeach
                          </tbody>
                        </table>