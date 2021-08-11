<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RfidModels extends Model
{
    use HasFactory;
    protected $table = "absen_rfid";
    protected $primaryKey = "no";
    protected $fillable = [
        'idkartu', 'nama_rfid', 'department','ruang','kegiatan','tanggung_jawab','tgl_masuk','jam_masuk','tgl_keluar','jam_keluar', 'created_at', 'updated_at'
    ];

    public function rfid()
    {
    	return $this->hasMany(Rfid::class);
    }
}
