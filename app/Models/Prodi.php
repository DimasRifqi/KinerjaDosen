<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $guarded = ['id_prodi'];
    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';

    // public function user(){
    //     return $this->hasMany(User::class, 'id_prodi', 'id_prodi');
    // }
}
