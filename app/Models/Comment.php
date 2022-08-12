<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        "description",
        "image",
        "id_user",
        "id_tache"
    ];

    public function client(){
        return $this->hasMany("App\Models\Client', 'equipe_id'");
    }
    public function user(){
        return $this->hasOne("App\Model\User", "id_user");
    }
    public function createdBy(){
        return $this->belongsTo(User::class);
    }
    public function soustaches(){
        return $this->belongsTo(Soustache::class);
    }
    
}
