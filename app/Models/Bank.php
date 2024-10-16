<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $guarded = ['id_bank'];
    protected $table ='bank';
    protected $primaryKey = 'id_bank';

    public function user(){
        return $this->hasMany(User::class, 'id_bank', 'id_bank');
    }

}
