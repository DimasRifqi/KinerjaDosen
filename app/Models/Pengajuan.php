<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $guarded = ['id_pengajuan'];
    protected $table = 'pengajuan';
    protected $primaryKey = ['id_pengajuan'];
}
