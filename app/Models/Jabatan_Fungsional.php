<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan_Fungsional extends Model
{
    use HasFactory;

    protected $guarded = ['id_jabatan_fungsional'];
    protected $table = 'jabatan_fungsional';
    protected $primaryKey = ['id_jabatan_fungsional'];

    
}