<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $guarded = ['id_periode'];
    protected $table = ['periode'];
    protected $primaryKey = ['id_periode'];
}
