<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gapok extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_gapok';
    protected $table = 'gapok';
    protected $guarded = ['id_gapok'];

    public function user(){
        return $this->hasMany(User::class, 'id_gapok', 'id_gapok');
    }
}