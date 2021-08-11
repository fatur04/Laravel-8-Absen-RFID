@extends('layout.v_template')
@section('title', 'Detail Absen')

@section('content')
@foreach ($detail as $detail)
 
<div class="box">
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th width="150px">Nomor RFID</th>
                <th width="30px">:</th>
                <th>{{ $detail->idkartu }}</th>
            </tr>
            <tr>
                <th width="150px">Nama</th>
                <th width="30px">:</th>
                <th>{{ $detail->nama_rfid }}</th>
            </tr>
            <tr>
                <th width="150px">Perusahaan</th>
                <th width="30px">:</th>
                <th>{{ $detail->department }}</th>
            </tr>
            <tr>
                <th width="150px">Ruang</th>
                <th width="30px">:</th>
                <th>{{ $detail->ruang }}</th>
            </tr>
            <tr>
                <th width="150px">Kegiatan</th>
                <th width="30px">:</th>
                <th>{{ $detail->kegiatan }}</th>
            </tr>
            <tr>
                <th width="150px">Penanggung Jawab</th>
                <th width="30px">:</th>
                <th>{{ $detail->tanggung_jawab }}</th>
            </tr>
            <tr>
                <th width="150px">Tanggal Masuk</th>
                <th width="30px">:</th>
                <th>{{ $detail->tgl_masuk }}</th>
            </tr>
            <tr>
                <th width="150px">Jam Masuk</th>
                <th width="30px">:</th>
                <th>{{ $detail->jam_masuk }}</th>
            </tr>
            <tr>
                <th width="150px">Tanggal Keluar</th>
                <th width="30px">:</th>
                <th>{{ $detail->tgl_keluar }}</th>
            </tr>
            <tr>
                <th width="150px">Jam Keluar</th>
                <th width="30px">:</th>
                <th>{{ $detail->jam_keluar }}</th>
            </tr>
            <tr>
                <th><a href="/absenkeluar" class="btn btn-success tbn-sm">Kembali</a></th>
            </tr>
        </table>
    </div>
</div>
   
@endforeach
@endsection
