<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LogbookModel extends Model
{
    public function allData()
    {
        return DB::table('anggota')
                ->leftJoin('kegiatan', 'kegiatan.rfid', '=', 'anggota.rfid')
                ->get();
    }

    public function editData($rfid)
    {
        return DB::table('kegiatan')->where('rfid', $rfid)->first();

    }

    public function updateData($rfid, $data)
    {
        DB::table('anggota')
                ->leftJoin('kegiatan', 'kegiatan.rfid', '=', 'anggota.rfid')
                ->where('anggota.rfid', $rfid)
                ->get($data);
    }

}

