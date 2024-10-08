<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_permohonan';
    protected $table = 'permohonan';
    protected $guarded = ['id_permohonan'];

    public function user(){
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
