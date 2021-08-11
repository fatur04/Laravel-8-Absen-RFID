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
<!-- <a href="log/print" class="btn btn-primary" target="_blank">Print</a> -->
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

<div class="box">

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
    <table class="table table-striped" id="emptableid" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Department/Perusahaan</th>
                <th>Ruang</th>
                <th>Kegiatan</th>
                <th>Penanggung Jawab</th>
                <th>Tanggal & Jam Masuk</th>
                <th>Tanggal & Jam Keluar</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
   

   </div>
</div>
    <!-- /.box-body -->
</div>
  <!-- /.box -->
  <script src="{{asset('template')}}/jquery.min.js"></script>
  <script type="text/javascript">
    
    $(document).ready(function() {
        $("#emptableid").DataTable({
              serverSide: true,
              ajax: {
                  url: '{{url('emp_list')}}',
                  
              },
              searchable: false,
              orderable: false,
              targets: 0,

              buttons: false,
              searching: true,
              scrollY: 500,
              scrollX: true,
              scrollCollapse: true,
              columns: [
                  {
                        "data" :null, "sortable": false,
                        render : function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                  },
                  {data: "nama_rfid", className: 'nama_rfid'},
                  {data: "department", className: 'department'},
                  {data: "ruang", className: 'ruang'},
                  {data: "kegiatan", className: 'kegiatan'},
                  {data: "tanggung_jawab", className: 'tanggung_jawab'},
                  {data: "created_at", className: 'created_at'},
                  {data: "updated_at", className: 'updated_at'}
                  
              ],  
              order: [[0, 'desc']]
        });
        
    });
  </script>

@endsection
