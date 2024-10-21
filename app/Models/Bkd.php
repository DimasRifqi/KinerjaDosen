<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bkd extends Model
{
    use HasFactory;
    protected $primaryKey  = 'id_bkd';
    protected $table = 'bkd';
    protected $guarded = ['id_bkd'];

    
}
