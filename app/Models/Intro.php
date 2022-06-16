<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    use HasFactory;
    protected $table = "introduces";

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}