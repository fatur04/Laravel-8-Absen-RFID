<!DOCTYPE html>
<html>
<head>
  <title>Report Logbook</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <style type="text/css">
		table tr td,
		table tr th{
			font-size: 6pt;
		}
	</style>

  <center>
    <h3>Laporan Log Book</h4>
    <?php 
    $timezone = "Asia/Jakarta";
    $date = new DateTime('now', new DateTimeZone($timezone));
    $timestamp = $date->format('d-m-Y H:i:s');
    ?>
    <h5>Date: {{ $timestamp }}</h6>
  </center>

  <div class="table-responsive">
    <table class='table table-bordered'>
      <thead class="thead-light">
        <tr>
          <th>No</th>
          <th>ID Kartu</th>
          <th>Nama</th>
          <th>Department/Perusahaan</th>
          <th>Ruang</th>
          <th>Kegiatan</th>
          <th>Penanggung Jawab</th>
          <th>Tanggal Masuk</th>
          <th>Jam Masuk</th>
          <th>Tanggal Keluar</th>
          <th>Jam Keluar</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1 ?>
        @foreach ($prints as $data)
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $data->idkartu }}</td>
          <td>{{ $data->nama_rfid }}</td>
          <td>{{ $data->department }}</td>
          <td>{{ $data->ruang }}</td>
          <td>{{ $data->kegiatan }}</td>
          <td>{{ $data->tanggung_jawab }}</td>
          <td>{{ $data->tgl_masuk }}</td>
          <td>{{ $data->jam_masuk }}</td>
          <td>{{ $data->tgl_keluar }}</td>
          <td>{{ $data->jam_keluar }}</td>
        </tr>
              
        @endforeach
        </tbody>
    </table>
  </div>


</body>
</html>