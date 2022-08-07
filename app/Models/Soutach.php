<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soutach extends Model
{
    use HasFactory;

    protected $fillable = [
        "inti_tache",
        "Deadline",
        "assignation",
        "description",
        "file",
        "image",

    ];

    public function SouTache(){
        return $this->hasOne('App\Models\Tache', 'tache_id');
    }
}
