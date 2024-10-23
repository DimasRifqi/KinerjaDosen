<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gapok extends Model
{
    use HasFactory;

    protected $table = 'gapok';
    protected $guarded = ['id_gapok'];
    protected $primaryKey = 'id_gapok';

    public function user(){
        return $this->hasMany(Gapok::class, 'id_gapok', 'id_gapok');
    }
}
