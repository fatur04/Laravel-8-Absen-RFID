@extends('layout.v_template')
@section('title', 'Absen Keluar')
<style>
    form {
        max-width: 600px;
        display: block;
        margin: auto;
    }
</style>
<script type="text/javascript">
    function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    var waktu = new Date();            //membuat object date berdasarkan waktu saat
    var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
    var sm = waktu.getMinutes() + "";  //memunculkan nilai detik
    var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
    document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
<script src="{{asset('template')}}/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#getUID").load("/tapkeluar");
        setInterval(function() {
               $("#getUID").load("/tapkeluar");
       }, 500);
   });
</script>
@section('content')

<div class="container">
  <form action="/absentap/simpan/" method="POST" enctype="multipart/form-data" >
    @csrf
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i>Success</h4>
            {{ session('pesan') }}.
        </div>
    @endif
    <div class="register-box-body">
        <h2 style="text-align: center"><b>Absen Keluar Data Center</b></h2>
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
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
                   <h2><center>TAP RFID</center></h2>
                   <h5><marquee >Scan Your RFID Card Here</marquee></h5>
                   <div name="id" id="getUID"></div>
                    
                </div> 

            </div>
        </div>
    </form>
</div>


@endsection
