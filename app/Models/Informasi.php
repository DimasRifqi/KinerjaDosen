<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;
    protected $guarded = ['id_informasi'];
    protected $primaryKey = 'id_informasi';
    protected $table = 'informasi'; 
}
