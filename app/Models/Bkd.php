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

    public function user(){
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id_periode');
    }

}