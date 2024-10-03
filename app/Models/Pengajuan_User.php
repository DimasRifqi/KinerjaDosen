<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan_User extends Model
{
    use HasFactory;

    protected $guarded = ['id_pengajuan_user'];
    protected $table = ['pengajuan_user'];
    protected $primaryKey = ['id_pengajuan_user'];
}
