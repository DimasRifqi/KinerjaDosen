<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Span extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_span';
    protected $table = 'span';
    protected $guarded = ['id_span'];


}
