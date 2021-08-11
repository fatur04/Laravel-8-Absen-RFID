@extends('layout.v_template')
@section('title', 'Report Logbook')

@section('content')
<!-- <form action="/report/pdf" action="GET" target="_blank" enctype="multipart/form-data"> -->
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="register-box-body">
        <div class="form-group">
            <label>Start Date:</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
            <input type="date" name="tgl_awal" class="form-control pull-right" id="tgl_awal" autocomplete="off" >
            </div>
        </div>
        <div class="form-group">
            <label>End Date:</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
            <input type="date" name="tgl_akhir" class="form-control pull-right" id="tgl_akhir" autocomplete="off" >
            </div>
        </div>
        <div class="form-group">
            <!-- <button type="submit" class="btn btn-primary btn-sm" >Export PDF</button> -->
            <a href="" onclick="this.href='{{ url('report/pdf') }}' + '/' + 
            document.getElementById('tgl_awal').value + '/' + 
            document.getElementById('tgl_akhir').value " class="btn btn-primary" 
            target="_blank"> Export PDF</a>   
        </div>
    </div>
  </div>
</div>
<!-- </form> -->

@endsection