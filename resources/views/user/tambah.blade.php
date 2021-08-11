@extends('layout.v_template')
@section('title', 'Absen Masuk')
<style>
    form {
        /* margin-left: 25%;
        margin-right:25%; */
        /* width: 50%; */
        max-width: 500px;
        display: block;
        margin: auto;
    }
</style>
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
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="register-box-body">
        <h2 style="text-align: center"><b>Register</b></h2>
        <div class="row">
            <form method="POST" action="/user/simpan/">
                @csrf
                <div class="form-group has-feedback">
                    <label>RFID</label>
                    <textarea name="rfid" id="getUID" class="form-control" placeholder="Tap Kartu RFID" rows="1" cols="123" autocomplete="off" required></textarea>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="name" class="form-control" placeholder="Full name" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password" required>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4">

                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
