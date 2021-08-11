<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRfid;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DateTime;
use DateTimeZone;
use PDF;
use File;
use DataTables;

class UserRfidController extends Controller
{
    // public function __construct()
    // {
    //     $this->UserRfid = new User();
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('user_rfid.index_rfid');
    }

    public function prosesid(Request $request)
    {
        $query = DB::table('rfid')
                ->orderBydesc('rfid.id')
                ->get();
        //$query = UserRfid::latest()->get();
        //dd($query->norfid);
       //return DataTables::queryBuilder($query)->toJson();
       return DataTables::of($query)->make(true);
    //    return datatables()->of(UserRfid::latest()->get())
    //         ->addColumn('action', function ($jobs) {
    //             $button = '<div class="btn-group btn-group-xs">';
    //             $button .= '<a href="/userrfid/edit/' . $jobs->id . '" class="btn btn-primary btn-xs"><i class="fa fa-edit fa-fw"></i>&nbsp;Edit</a>';
    //             $button .= '<a href="/userrfid/delete/' . $jobs->id . '"  class="btn btn-danger btn-xs deleteButton"><i class="fas fa-trash-alt"></i>&nbsp;Delete</button>';
    //             $button .= '</div>';
    //             return $button;
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    }

    public function tambah()
    {
        DB::table('tmprfid')->truncate();
        return view('user_rfid.tambah');
    }

    public function simpan(Request $request)
    {
        //dd($request->all());

        $data = [
            'norfid' => $request->rfid,
            'nama_rfid' => $request->nama,
            'department' => $request->department,

        ];
        DB::table('rfid')
            ->insert($data);
        
        return redirect('/userrfid')->with('pesan', 'Data User RFID Sudah Update');
    }
}
