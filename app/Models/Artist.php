<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['stage_name', 'birthday', 'genre'];

    public function songs()
    {
        return $this->belongsToMany('App\Models\Song');
    }
}
