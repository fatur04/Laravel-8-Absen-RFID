<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserRfid extends Model
{
    use HasFactory;
    protected $table = "rfid";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','norfid','nama_rfid','department'
    ];
}
