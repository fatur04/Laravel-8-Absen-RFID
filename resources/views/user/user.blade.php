@extends('layout.v_template')
@section('title', 'Log Book')
{{--  <style>
    form {
        margin-left: 25%;
        margin-right:25%;
        width: 50%;
    }
</style>  --}}
<script type="text/javascript">
    function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    var waktu = new Date();            //membuat object date berdasarkan waktu saat
    var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
    var sm = waktu.getMinutes() + "";  //memunculkan nilai detik
    var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
    document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>

@section('content')

<div align="center">
    @php
    $tanggal = mktime(date('m'), date("d"), date('Y'));

    echo "Tanggal : <b> " . date("d-m-Y", $tanggal ) . " |</b>";

    date_default_timezone_set("Asia/Jakarta");

    $jam = date ("H:i:s");
    //echo " | Pukul : <b align='center'> " . $jam . " " ." </b> ";

    $a = date ("H");
    @endphp
    <body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
        Pukul :
    <span id="clock"></span>
</div>

<a href="/user/tambah" class="btn btn-success">Tambah</a>
<div class="box">
  <div class="container">
    <div class="row">
        <div class="col-md-8">
          <h3 style="text-align: left"><b>View User</b></h3>
        </div>
        <div class="col-md-4" style="margin-top:15px">
            <form action="/user/search" method="GET">
                <div class="form-inline">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
  </div>


    <!-- /.box-header -->
    <div class="box-body">
        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i>Success</h4>
            {{ session('pesan') }}.
        </div>
    @endif

   <div class="table-responsive">
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                {{--  <th>Password</th>  --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $data)
                <tr>
                    <td>{{ $users->firstItem() + $key }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    {{--  <td>{{ $data->password }}</td>  --}}
                    <td>
                        <a href="/user/edit/{{ $data->id }} " class="btn btn-primary">Edit</a>
                        <a href="/user/hapus/{{ $data->id }} " class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-left">
        Showing
        {{ $users->firstItem() }}
        to
        {{ $users->lastItem() }}
        of
        {{ $users->total() }}
        entries
    </div>
    <div class="pull-right">
        {{ $users->links() }}
    </div>

   </div>
</div>
    <!-- /.box-body -->
</div>
  <!-- /.box -->


@endsection
