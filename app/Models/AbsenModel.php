<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AbsenModel extends Model
{
    use HasFactory;
    protected $table = "absen_rfid";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','idkartu','ruang','kegiatan','tanggung_jawab','tgl_masuk','jam_masuk', 'tgl_masuk','jam_keluar'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function detailData($id)
    {
        return DB::table('absen')->where('id', $id)->first();
    }

    
}
