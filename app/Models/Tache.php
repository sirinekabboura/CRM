<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        "inti_tache",
        "Deadline",
        "assignation",
        "description",
        "file",
        "soustache_id",

    ];

    public function SousTache(){
        return $this->hasMany('App\Models\soustache', 'soustache_id');
    }
    public function comments(){
        return $this->hasMany('App\Model\Comment', 'id_comment');
    }
}
