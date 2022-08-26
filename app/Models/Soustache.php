<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soustache extends Model
{
    use HasFactory;

    protected $fillable = [
        "inti_tache",
        "Deadline",
        "assignation",
        "description",
        "file",
        "image",
        "tache_id",

    ];

    public function SousTache(){
        return $this->hasOne('App\Models\Tache', 'tache_id');
    }
}
