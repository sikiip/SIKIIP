                      <tr class="odd gradeA">
                        <td>{{$data->nik}}</td>
                        <td>{{$data->id_sidik_jari}}</td>
                        <td>{{$data->nama_karyawan}}</td>
                        <td>{{$data->divisi}}</td>
                        <td><pre>Jam Masuk    :<br>Jam Keluar   : <br>Jumlah Telat : <br>Jumlah awal  : <br></pre></td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 21 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 22 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 23 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 24 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 25 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 26 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 27 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 28 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 29 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>@foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 30 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 31 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 1 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 2 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 3 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach</td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 4 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 5 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach</td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 6 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach</td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 7 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 8 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 9 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 10 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 11 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 12 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 13 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 14 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach</td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 15 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach</td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 16 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 17 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 18 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 19 )
                                  {{$presensi->jam_presensi}}<br>
                                  
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach($data_presensi as $presensi)
                             @if($data->id_sidik_jari == $presensi->id_sidik_jari)
                                @if(DateTime::createFromFormat('Y-m-d',$presensi->tanggal_presensi)->format('d') == 20 )
                                  {{$presensi->jam_presensi}}<br>
                                @endif
                             @endif
                          @endforeach
                        </td>
                        <td>
                          hahahaha
                        </td>
                        <td>Rp 3,000,000</td>
                        <td>Rp 12,000,000</td>
                        <td>Rp 225,000</td>
                        <td>Rp 12,400,000</td>
                        <td>456 567987654</td>
                        <td>BRI</td>
                      </tr>