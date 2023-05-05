<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'publication_date'];

    public function artists()
    {
        return $this->belongsToMany('App\Models\Artist');
    }
}
