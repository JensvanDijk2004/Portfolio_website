<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function post(){
        return $this->belonsTo(post::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }
}
