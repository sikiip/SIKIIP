<!DOCTYPE html>
<html>
<head>	
	<title></title>
</head>
<body>

	<p>Hallo, <b>{{$nama}}</b> </p>
	<p>Pengajuan izin anda telah <b>{{$keterangan_izin}}</b>, dengan data sebagai berikut:</p>
    <div align="center">
	            <table style="border: 2px solid">
                <thead>
                  <tr>
                    <th width="100px" style="" ><b>Tanggal Mulai</b></th>
                    <th width="100px" style="" ><b>Tanggal Akhir</b></th>
                    <th width="100px" style="" ><b>Tipe Izin</b></th>
                    <th width="200px" style="" ><b>Alasan</b></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center; vertical-align: center;"> {{$tanggal_mulai}} </td>
                    <td style="text-align: center; vertical-align: center;"> {{$tanggal_akhir}} </td>
                    <td style="text-align: center; vertical-align: center;"> {{$tipe_izin}}</td>
                    <td style="text-align: center; vertical-align: center;"> {{$alasan}} </td>
                  </tr>
                </tbody>
              </table>
    </div>
    <p>Terimakasih sudah menggunakan SIKIIP</p>
    <p>Admin - SIKIIP</p>

</body>
</html>