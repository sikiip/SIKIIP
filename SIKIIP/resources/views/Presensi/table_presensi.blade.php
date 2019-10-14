                        <table class="table">
                                                        <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center; vertical-align: center;">NIK</th>
                                <th rowspan="2" style="text-align: center; vertical-align: center;">ID_SJ</th>
                                <th rowspan="2" style="text-align: center; vertical-align: center;">Nama</th>
                                <th rowspan="2" style="text-align: center; vertical-align: center;">Divisi</th>
                                <th colspan="31" style="text-align: center; vertical-align: center;">Tanggal</th>
                                <th rowspan="2" style="text-align: center; vertical-align: center;">Total Late :</th>
                                <th rowspan="2" style="text-align: center; vertical-align: center;">Total Early :</th>
                                <th rowspan="2" style="text-align: center; vertical-align: center;">J.Keterlambatan</th>
                                <th rowspan="2" style="text-align: center; vertical-align: center;">Transport</th>
                                <th rowspan="2" style="text-align: center; vertical-align: center;">Tambahan.DLL</th>
                                <th rowspan="2" style="text-align: center; vertical-align: center;">T.Transport</th>
                                <th rowspan="2" style="text-align: center; vertical-align: center;">Keterangan</th>
                            </tr>
                            <tr>
                                <th>21</th>
                                <th>22</th>
                                <th>23</th>
                                <th>24</th>
                                <th>25</th>
                                <th>26</th>
                                <th>27</th>
                                <th>28</th>
                                <th>29</th>
                                <th>30</th>
                                <th>31</th>
                                <th>01</th>
                                <th>02</th>
                                <th>03</th>
                                <th>04</th>
                                <th>05</th>
                                <th>06</th>
                                <th>07</th>
                                <th>08</th>
                                <th>09</th>
                                <th>10</th>
                                <th>11</th>
                                <th>12</th>
                                <th>13</th>
                                <th>14</th>
                                <th>15</th>
                                <th>16</th>
                                <th>17</th>
                                <th>18</th>
                                <th>19</th>
                                <th>20</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $data_presensi_blade as $value)
                              @foreach( $data_karyawan as $data)
                                @if($data['id_sidik_jari'] == $value['id_sidik_jari'])
                                <tr>
                                    <td style="text-align: center; vertical-align: center;">{{$data['nik']}}</td>
                                    <td style="text-align: center; vertical-align: center;">{{$data['id_sidik_jari']}}</td>
                                    <td style="vertical-align: center;">{{$data['nama_karyawan']}}</td>
                                    <td style="vertical-align: center;">{{$data['divisi']}}</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data['id_sidik_jari'] == $presensi['id_sidik_jari'])
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi['tanggal_presensi'])->format('d') == 21 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 22 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 23 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 24 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 25 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 26 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 27 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 28 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 29 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 30 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 31 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 1 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 2 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 3 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 4 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 5 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 6 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 7 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 8 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 9 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 10 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 11 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 12 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 13 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 14 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 15 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 16 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 17 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 18 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 19 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td>
                                      @foreach($data_presensi as $presensi)
                                         @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                            @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 20 )
                                              @if($presensi['keterangan_presensi'] == null)
                                                {{$presensi['jam_clock_in']}}<br>
                                                {{$presensi['jam_clock_out']}}<br>
                                                {{$presensi['late_presensi']}}<br>
                                                {{$presensi['early_presensi']}}
                                              @else
                                                {{$presensi['keterangan_presensi']}}<br>
                                              @endif
                                            @endif
                                         @endif
                                      @endforeach</td>
                                    <td style="text-align: center; vertical-align: center;">{{$value['total_late_presensi']}}</td>
                                    <td style="text-align: center; vertical-align: center;">{{$value['total_early_presensi']}}</td>
                                    <td style="text-align: center; vertical-align: center;">{{$value['jumlah_keterlambatan']}}</td>
                                    <td style="text-align: center; vertical-align: center;">{{$value['transport_presensi']}}</td>        
                                    <td style="text-align: center; vertical-align: center;">{{$value['tambahan_presensi']}}</td>
                                    <td style="text-align: center; vertical-align: center;">{{$value['transport_presensi']+$value['tambahan_presensi']}}</td>
                                    <td style="text-align: center; vertical-align: center;">{{$value['keterangan']}}</td>
                                </tr>
                                @endif
                              @endforeach
                            @endforeach
                            </tbody>
                        </table>