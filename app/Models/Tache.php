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
        "Soutache_id",

    ];

    public function SouTache(){
        return $this->hasMany('App\Models\Soutache', 'Soutache_id');
    }
}
