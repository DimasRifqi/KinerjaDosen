<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $guarded = ['id_faq'];
    protected $primaryKey = 'id_faq';
    protected $table = 'faq';
}
