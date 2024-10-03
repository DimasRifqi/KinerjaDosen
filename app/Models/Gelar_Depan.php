<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelar_Depan extends Model
{
    use HasFactory;
    protected $guarded = ['id_gelar_depan'];
    protected $table = 'gelar_depan';
    protected $primaryKey = ['id_gelar_depan'];
}
