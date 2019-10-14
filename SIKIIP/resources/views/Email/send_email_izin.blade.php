<!DOCTYPE html>
<html>
<head>	
	<title></title>
</head>
<body>

	<p>Hallo, <b>{{$nama_atasan}}</b></p>
	<p>Ada karyawan yang mengajukan izin hari ini, dengan data sebagai berikut:</p>
	
	            <table style="border: 2px solid">
                <thead>
                  <tr>
                    <th width="100px" style="" ><b>NIK</b></th>
                    <th width="200px" style="" ><b>Nama</b></th>
                    <th width="150px" style="" ><b>Divisi</b></th>
                    <th width="100px" style="" ><b>Tanggal Mulai</b></th>
                    <th width="100px" style="" ><b>Tanggal Akhir</b></th>
                    <th width="100px" style="" ><b>Tipe Izin</b></th>
                    <th width="200px" style="" ><b>Alasan</b></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center; vertical-align: center;"> {{$nik}} </td>
                    <td style="text-align: center; vertical-align: center;"> {{$nama}} </td>
                    <td style="text-align: center; vertical-align: center;"> {{$divisi}} </td>
                    <td style="text-align: center; vertical-align: center;"> {{$tanggal_mulai}} </td>
                    <td style="text-align: center; vertical-align: center;"> {{$tanggal_akhir}} </td>
                    <td style="text-align: center; vertical-align: center;"> {{$tipe_izin}}</td>
                    <td style="text-align: center; vertical-align: center;"> {{$alasan}} </td>
                  </tr>
                </tbody>
              </table>
              <br>
              <div align="center">
                <a href="http://127.0.0.1:8000/persetujuan_izin/{{$id_persetujuan_izin}}/izin_diterima/"><button style = "color : white; text-align: center; border: none; padding: 12px 28px; background-color: #4C8BF5; margin-right: 5px; "><b>Izinkan</b></button></a>
                <a href="http://127.0.0.1:8000/persetujuan_izin/{{$id_persetujuan_izin}}/izin_ditolak/"><button style = "color: white; text-align: center; border: none; padding: 12px 28px; background-color: #EB4C3E; margin-left: 5px;" ><b>Tolak</b></button></a>
            	</div>
    <p>Terimakasih, atas perhatiannya!</p>
	  <p>Admin - SIKIIP</p>

</body>
</html>