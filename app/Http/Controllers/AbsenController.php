<?php

namespace App\Http\Controllers;

use App\Models\AbsenModel;
use App\Models\RfidModels;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use File;
use DataTables;

class AbsenController extends Controller
{

    // public function __construct()
    // {
    //     $this->AbsenModel = new AbsenModel();
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('absen.absenmasuk');
    }

    public function log()
    {
        return view('absen.log');
    }

    public function proses(Request $request)
    {
        //$data = AbsenModel::latest()->paginate(10);
        
        // $data = DB::table('absen_rfid')
        //     ->join('rfid','absen_rfid.idkartu', "=", 'rfid.norfid' )
        //     ->latest()
        //     ->paginate(10);
        // return view('absen.log', ['logs'=>$data]);
        
        $query = DB::table('absen_rfid')
                //->join('rfid','absen_rfid.idkartu', "=", 'rfid.norfid')
                ->orderBydesc('absen_rfid.no')
                ->get();
        //dd($query);
       // return DataTables::queryBuilder($query)->toJson();
       return DataTables::of($query)->make(true);
    }

    public function insert(Request $request)
    {
        //cek array
        //dd($request->all());
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $timestamp = $date->format('Y-m-d H:i:s');
        
        $data = [
            //'idkartu' => $request->user_vensor,
            'nama_rfid' => $request->nama,
            'department' => $request->perusahaan,
            'ruang' => implode(',', $request->ruang),
            'kegiatan' => implode(',', $request->kegiatan),
            'tanggung_jawab' => $request->tanggung_jawab,
            'tgl_masuk' => $tanggal,
            'jam_masuk' => $localtime,
            'created_at' => $timestamp,

        ];
        DB::table('absen_rfid')->insert($data);
        //AbsenModel::create($data);
        
        return redirect('/absenkeluar')->with('pesan', 'Sudah Absen Masuk');

    }

    // public function keluar()
    // {
    //     //$data = AbsenModel::all();
    //     $data = AbsenModel::latest()->paginate(10);
    //     //$data = DB::table('absen')->orderBy('id', 'DESC');
    //     return view('absen.absenkeluar', ['logs'=>$data]);
    // }

    public function keluar()
    {
        //$data = AbsenModel::all();
        //$dapat = RfidModels::latest()->paginate(10);
        
        $data = DB::table('absen_rfid')
            // ->join('rfid','absen_rfid.idkartu', "=", 'rfid.norfid' )
            ->latest()
            ->paginate(10);
        //dd($data);
        return view('absen.absenkeluar', ['logs'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $timestamp = $date->format('Y-m-d H:i:s');

        // $data = [
        //     'tglkeluar' => $tanggal,
        //     'jamkeluar' => $localtime,

        // ];
        $data = [
            'tgl_keluar' => $tanggal,
            'jam_keluar' => $localtime,
            'updated_at' => $timestamp,
        ];
        //DB::table('absen')->update($id, $data);
        DB::table('absen_rfid')
            ->where('no', $id)
            ->update($data);

        return redirect()->back()->with('pesan', 'Sudah Absen Keluar');

    }

    public function search(Request $request)
    {
        if (isset($_GET['search'])) {

            $search = $_GET['search'];
            $logs = DB::table('absen_rfid')
                ->where('nama_rfid', 'LIKE', '%'.$search.'%')
                ->orwhere('department', 'LIKE', '%'.$search.'%')
                ->orwhere('ruang', 'LIKE', '%'.$search.'%')
                ->orwhere('kegiatan', 'LIKE', '%'.$search.'%')
                ->orwhere('tanggung_jawab', 'LIKE', '%'.$search.'%')
                ->orwhere('tgl_masuk', 'LIKE', '%'.$search.'%')
                ->orwhere('jam_masuk', 'LIKE', '%'.$search.'%')
                ->orwhere('tgl_keluar', 'LIKE', '%'.$search.'%')
                ->orwhere('jam_keluar', 'LIKE', '%'.$search.'%')
                ->paginate(10);
            return view('absen.absenkeluar', ['logs'=>$logs]);

        }else{
            return view('absen.absenkeluar');
        }
    }

    public function lihat($id)
    {
        // if (!$this->AbsenModel->detailData($id)) {
        //     abort(404);
        // }
        // $data = [
        //     'detail' => $this->AbsenModel->detailData($id),
        // ];
        //$data = RfidModels::find($id);
        $data = DB::table('absen_rfid')
            //->join('rfid','absen_rfid.idkartu', "=", 'rfid.norfid' )
            ->where('absen_rfid.no', $id)
            ->get();
            // ->latest()
            // ->paginate(10);
        //dd($data);
        return view('absen.detail', ['detail'=>$data]);
    }

    public function print()
    {
        $data = AbsenModel::all();
        
        //return view('absen.print', ['prints'=>$data]);
        $pdf = PDF::loadView('absen.print', ['prints'=>$data]);
        return $pdf->stream();
    }

    public function report()
    {
        return view('absen.report');
    }

    public function pdf($tgl_awal, $tgl_akhir)
    {
        //dd([$tgl_awal, $tgl_akhir]);
        $data = DB::table('absen_rfid')
                //->join('rfid','absen_rfid.idkartu', "=", 'rfid.norfid' )
                ->whereBetween('tgl_masuk', [$tgl_awal, $tgl_akhir])
                ->select('*')
                ->orderBy('tgl_masuk', 'asc')
                ->get();
        //return view('absen.print', ['prints'=>$data]);
        $pdf = PDF::loadView('absen.print', ['prints'=>$data]);
        return $pdf->stream();
        //dd($data);
        
    }

    // public function rfid(Request $request)
    // {
    //     //dd($request->all());
    //     // $rfid = $_GET['UIDresult'];
    //     // $cetak = $rfid;
    //     // file_put_contents('RFID.php',$cetak);
    //     //return view('absen.getUID');
        
    //     DB::table('tmprfid')->truncate();
    //     $data = [
    //         'nokartu' => $request->UIDresult,
    //     ];
    //     DB::table('tmprfid')->insert($data);
    // }

    public function get()
    {
        //return File::get(public_path() . '/RFID.php');

        $data = DB::table('tmprfid')->first();
        return view('absen.tampilrfid', ['baca'=>$data]);
    }

    public function absentap()
    {
        // $path = public_path().'/RFID.php';
        // if(file_exists($path)){
        //     unlink($path);
        // }
        DB::table('tmprfid')->truncate();
        return view('absen.absentap');
    }

    public function tapping()
    {

        //$dapat = File::get(public_path() . '/RFID.php');
        //dd($dapat);
        //$data = AbsenModel::find($dapat);

        $dapat = DB::table('tmprfid')->first();
        $data = DB::table('rfid')
                ->where('norfid', 'LIKE', '%'.$dapat->nokartu.'%')
                ->first();
        if(isset($data->norfid)){
            return view('absen.scanbaca', ['tampils'=>$data]);
        } 
        return view('absen.eror');     
        //return view('absen.scanbaca', ['tampils'=>$rfid]);

    }

    public function simpantap(Request $request)
    {
        //dd($request->all());
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $timestamp = $date->format('Y-m-d H:i:s');

        $data = [
            'idkartu' => $request->norfid,
            'nama_rfid' => $request->nama_rfid,
            'department' => $request->department,
            'ruang' => implode(',', $request->ruang),
            'kegiatan' => implode(',', $request->kegiatan),
            'tanggung_jawab' => $request->tanggung_jawab,
            'tgl_masuk' => $tanggal,
            'jam_masuk' => $localtime,
            'created_at' => $timestamp,

        ];
        DB::table('absen_rfid')->insert($data);
        
        return redirect('/absentapkeluar')->with('pesan', 'Sudah Absen Masuk');
    }

    public function tapkeluar()
    {
        
        //$dapat = File::get(public_path() . '/RFID.php');

        $dapat = DB::table('tmprfid')->first();

        $data = DB::table('absen_rfid')
                ->where('idkartu', 'LIKE', '%'.$dapat->nokartu.'%')
                ->first();
        
        if (isset($data->idkartu)){
            $timezone = "Asia/Jakarta";
            $date = new DateTime('now', new DateTimeZone($timezone));
            $tanggal = $date->format('Y-m-d');
            $localtime = $date->format('H:i:s');
            $timestamp = $date->format('Y-m-d H:i:s');

            $jam = [
                'tgl_keluar' => $tanggal,
                'jam_keluar' => $localtime,
                'updated_at' => $timestamp,
            ];
           
            DB::table('absen_rfid')
                ->where('idkartu', $dapat->nokartu)
                ->update($jam);
            
            $hasil = DB::table('absen_rfid')
                ->join('rfid','absen_rfid.idkartu', "=", 'rfid.norfid' )
                ->where('absen_rfid.idkartu', $dapat->nokartu)
                ->first();    
            //dd($hasil);
            return view('absen.scankeluar', ['tampils'=>$hasil]);
        }
        return view('absen.eror');
        
    }

    public function absentapkeluar()
    {
        // $path = public_path().'/RFID.php';
        // if(file_exists($path)){
        //     unlink($path);
        // }
        DB::table('tmprfid')->truncate();
        $data = DB::table('absen_rfid')
            // ->join('rfid','absen_rfid.idkartu', "=", 'rfid.norfid' )
            ->latest()
            ->paginate(10);
        //dd($data);
        
        return view('absen.absentapkeluar', ['logs'=>$data]);
    }

       

















    // public function store(Request $request)
    // {

    //     $timezone = "Asia/Jakarta";
    //     $date = new DateTime('now', new DateTimeZone($timezone));
    //     $tanggal = $date->format('Y-m-d');
    //     $localtime = $date->format('H:i:s');

    //     Request()->validate([
    //         //'user_id' => ['required', 'bigInteger', 'max:11'],
    //         'nama' => ['required', 'string', 'max:255'],
    //         'perusahaan' => ['required', 'string', 'max:255'],
    //         'ruang' => ['required', 'string', 'max:255'],
    //         'kegiatan' => ['required', 'string', 'max:255'],
    //         'tanggung_jawab' => ['required', 'string', 'max:255'],

    //     ]);

    //    $data = [
    //     //'user_id' => auth()->user()->id,
    //     'nama' => Request()->nama,
    //     'perusahaan' => Request()->perusahaan,
    //     'ruang' => Request()->ruang,
    //     'kegiatan' => implode(',', $request->kegiatan),
    //     'tanggung_jawab' => Request()->tanggung_jawab,
    //     'tgl' => $tanggal,
    //     'jammasuk' => $localtime,
    //    ];

    //     DB::table('absen')->insert($data);
    //     return view('absen.keluar', ['tampil'=>$data])->with('pesan', 'Data Berhasil Di Tambahkan');

    // }
}
