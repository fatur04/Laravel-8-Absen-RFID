<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnggotaModel extends Model
{
    public function allData()
    {
        return DB::table('anggota')->get();
    }

    public function detailData($id_anggota)
    {
        return DB::table('anggota')->where('id_anggota', $id_anggota)->first();
    }

    public function addData($data)
    {
        return DB::table('anggota')->insert($data);
    }

    public function editData($id_anggota, $data)
    {
        DB::table('anggota')
            ->where('id_anggota', $id_anggota)
            ->update($data);
    }

    public function deleteData($id_anggota)
    {
        DB::table('anggota')
            ->where('id_anggota', $id_anggota)
            ->delete();
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
