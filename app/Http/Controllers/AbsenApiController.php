<?php

namespace App\Http\Controllers;

use App\Models\RfidModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenApiController extends Controller
{
    public function log()
    {
        $logs = RfidModels::all();
        return response()->json(['message' => 'Success', 'data' => $logs]);
    }

    public function simpantap(Request $request)
    {
        $simpantap = RfidModels::create($request->all());
        return response()->json(['message' => 'Success Simpan', 'data' => $simpantap]);
    }

    public function update(Request $request, $id)
    {
        
        $update = DB::table('absen_rfid')
                    ->where('no',$id)
                    ->update(['jam_keluar'=>$request->jam_keluar
        ]);
        return response()->json([
            'status'=>true,
            'message'=>'update success',
            'data' => $update
        ]);
        
    }

    public function delete($id)
    {
        $delete = RfidModels::find($id);
        $delete->delete();
        return response()->json(['message' => 'Success Delete', 'data' => null]);
    }
}
