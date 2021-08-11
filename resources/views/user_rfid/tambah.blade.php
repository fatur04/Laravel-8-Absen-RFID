@extends('layout.v_template')
@section('title', 'Edit User')
<script src="{{asset('template')}}/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#getUID").load("/get");
        setInterval(function() {
               $("#getUID").load("/get");
       }, 500);
   });
</script>
@section('content')

<form action="/userrfid/simpan/" method="POST" enctype="multipart/form-data">
    @csrf
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-sm-6">
                  <div class="register-box-body">
                    <div class="form-group row">
                        <label>RFID</label>
                        <textarea name="rfid" id="getUID" class="form-control" placeholder="Tap Kartu RFID ..." rows="1" cols="123" autocomplete="off" required></textarea>
                    </div>
    
                    <div class="form-group row">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control"  placeholder="Nama ..." autocomplete="off" required>
                    </div>
    
                    <div class="form-group row">
                        <label>Department</label>
                        <input type="text" name="department" class="form-control" placeholder="Department ..." autocomplete="off" required>
                    </div>
                    
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary" rows="2">Simpan</button>
                    </div>
                  </div>
            </div>
        </div>
    </form>

@endsection
