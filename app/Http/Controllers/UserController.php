<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DateTime;
use DateTimeZone;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->AbsenModel = new User();
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $data = User::latest()->paginate(10);
        return view('user.user', ['users'=>$data]);
    }

    public function hapus($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->delete();
        
        return redirect()->route('index')->with('pesan', 'Data Terhapus');;
    }

    public function tambah()
    {
        DB::table('tmprfid')->truncate();
        return view('user.tambah');
    }

    public function simpan(Request $request)
    {
        //cek array
        //dd($request->all());
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $timestamp = $date->format('Y-m-d H:i:s');

        $data = [
            'rfid' => $request->rfid,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_rfid' => $request->password,
            'created_at' => $timestamp,
            'updated_at' => $timestamp,

        ];
        DB::table('users')->insert($data);
        
        //AbsenModel::create($data);
        return redirect()->route('index')->with('pesan', 'Sudah Ditambahkan');

    }

    public function edit($id)
    {
        DB::table('tmprfid')->truncate();
        $data = DB::table('users')
            ->where('id', $id)
            ->first();
        
        return view('user.edit', ['edits'=>$data]);
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $timezone = "Asia/Jakarta";
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $timestamp = $date->format('Y-m-d H:i:s');

        $data = [
            'rfid' => $request->rfid,
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_rfid' => $request->password,
            'created_at' => $timestamp,
            'updated_at' => $timestamp,

        ];
        DB::table('users')
            ->where('id', $id)
            ->update($data);
        
        return redirect('/user')->with('pesan', 'Data User Sudah Update');
    }

    public function search(Request $request)
    {
        if (isset($_GET['search'])) {

            $search = $_GET['search'];
            $logs = DB::table('users')
                ->where('name', 'LIKE', '%'.$search.'%')
                ->orwhere('email', 'LIKE', '%'.$search.'%')
                ->paginate(10);
            return view('user.user', ['users'=>$logs]);

        }else{
            return view('user.user');
        }
    }
}
