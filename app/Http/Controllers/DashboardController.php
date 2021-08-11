<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('absen.log');
    }

    public function rfid(Request $request)
    {
        //dd($request->all());
        // $rfid = $_GET['UIDresult'];
        // $cetak = $rfid;
        // file_put_contents('RFID.php',$cetak);
        //return view('absen.getUID');
        
        DB::table('tmprfid')->truncate();
        $data = [
            'nokartu' => $request->UIDresult,
        ];
        DB::table('tmprfid')->insert($data);
    }
}
