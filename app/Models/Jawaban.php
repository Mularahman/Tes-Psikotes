<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $guarded =['id'];



    public function soal(){
       return $this->belongsTo(Soal::class);
   }
   public function user(){
        return $this->belongsTo(User::class);
   }
   public function quiz(){
    return $this->belongsTo(Quiz::class);
   }
}
