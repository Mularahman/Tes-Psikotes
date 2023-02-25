<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }


    public function jawab()
    {
        return $this->hasMany(Jawaban::class);
    }
}
