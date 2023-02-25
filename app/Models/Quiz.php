<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function soals(){
        return $this->hasMany(Soal::class);
    }
     public function quizuser(){
        return $this->hasMany(Pesertaquiz::class);
    }
     public function hasil(){
        return $this->hasMany(Hasil::class);
    }

}
