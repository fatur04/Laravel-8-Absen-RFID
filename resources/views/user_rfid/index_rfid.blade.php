@extends('layout.v_template')
@section('title', 'Log Book')
{{--  <style>
    form {
        margin-left: 25%;
        margin-right:25%;
        width: 50%;
    }
</style>  --}}

@section('content')
<a href="/userrfid/tambah/" class="btn btn-primary" >Tambah</a>

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
    <table class="table table-striped" id="table" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>No RFID</th>
                <th>Nama</th>
                <th>Department</th>
                <!-- <th>Action</th> -->
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
        $("#table").DataTable({
              serverSide: true,
              ajax: {
                  url: '{{url('prosesid')}}',  
              },
              
              columns: [
                  {
                        "data" :null, "sortable": false,
                        render : function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                  },
                  {data: "norfid", className: 'norfid'},
                  {data: "nama_rfid", className: 'nama_rfid'},
                  {data: "department", className: 'department'},
                //   {data: 'action', name: 'action', orderable: false},
              ],  
              order: [[0, 'desc']]
        });
        
    });
  </script>

@endsection
