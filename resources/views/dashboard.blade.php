@extends('layout.v_template')
@section('title', 'Dashboard')


@section('content')
<style>


    ul.topnav {
        list-style-type: none;
        margin: auto;
        padding: 0;
        overflow: hidden;
        background-color: #4CAF50;
        width: 70%;
    }

    ul.topnav li {float: left;}

    ul.topnav li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    ul.topnav li a:hover:not(.active) {background-color: #3e8e41;}

    ul.topnav li a.active {background-color: #333;}

    ul.topnav li.right {float: right;}

    @media screen and (max-width: 600px) {
        ul.topnav li.right,
        ul.topnav li {float: none;}
    }

    td.lf {
        padding-left: 15px;
        padding-top: 12px;
        padding-bottom: 12px;
    }
    </style>
    <div class="row">
        <div class="col-md-3">

        </div>
        <!-- /.col -->

        <div class="col-md-6">
            <div id="show_user_data">
                <form>
                    <table  width="452" border="1" bordercolor="#10a0c5" align="center"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="padding: 2px">
                        <tr>
                            <td  height="40" align="center"  bgcolor="#10a0c5"><font  color="#FFFFFF">
                                <h3>Scan RFID</h3>
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td  bgcolor="#f9f9f9">
                                <table width="452"  border="0" align="center" cellpadding="5"  cellspacing="0">
                                    <tr>
                                        <td width="113" align="left" class="lf">ID</td>
                                        <td style="font-weight:bold">:</td>
                                        <td align="left">--------</td>
                                    </tr>
                                    <tr bgcolor="#f2f2f2">
                                        <td align="left" class="lf">Nama</td>
                                        <td style="font-weight:bold">:</td>
                                        <td align="left">--------</td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="lf">NRP</td>
                                        <td style="font-weight:bold">:</td>
                                        <td align="left">--------</td>
                                    </tr>
                                    <tr bgcolor="#f2f2f2">
                                        <td align="left" class="lf">Dept</td>
                                        <td style="font-weight:bold">:</td>
                                        <td align="left">--------</td>
                                    </tr>
                                </table>
                                <h4 align="center"><strong>Aktivitas</strong></h4>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="col-sm-4">
                                            <h5 style="center"><strong>Schedule</strong></h5>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="col-sm-4">
                                            <h5><strong>Unschedule</strong></h5>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="col-md-4">
                                            <input type="checkbox"> Maintenance
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox"> Install
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox"> Troubleshoot
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox"> Check
                                        </div>
                                        <div class="col-md-4">
                                            <input type="checkbox"> Others
                                        </div>
                                    </div>
                                </div>


                                <p align="center"><a href="#" class="btn btn-success" type="submit">Submit</a></p>
                                <div align="right">
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
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <!-- /.col -->

        <div class="col-md-8">
            <script type="text/javascript">
                function tampilkanwaktu(){         //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
                var waktu = new Date();            //membuat object date berdasarkan waktu saat
                var sh = waktu.getHours() + "";    //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
                var sm = waktu.getMinutes() + "";  //memunculkan nilai detik
                var ss = waktu.getSeconds() + "";  //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
                document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
                }
            </script>
        </div>
        <!-- /.col -->
      </div>
@endsection
