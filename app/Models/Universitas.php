<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universitas extends Model
{
    use HasFactory;

    protected $guarded = ['id_universitas'];
    protected $table = 'universitas';
    protected $primaryKey = ['id_universitas'];

}
