<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Span extends Model
{
    use HasFactory;

    protected $table = 'span';
    protected $guarded = ['id_span'];
    protected $primaryKey = 'id_span';

    
}
