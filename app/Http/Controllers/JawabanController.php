<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Jawaban;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function index(Request $request){

        $jawab = Jawaban::where('soal_id',$request->soal_id)->where('user_id',$request->user_id)->first();
        $soal = Soal::find($request->soal_id);

        if($jawab){
            $jawab->update($request->all());
            if($soal->jawaban == $request->jawaban){
                $jawab->update(['status' => 1]);
            }else{
                $jawab->update(['status' => 0]);
            }
        }
        else{
            if($soal->jawaban == $request->jawaban){
                Jawaban::Create([
                    'jawaban' => $request->jawaban,
                    'user_id' => $request->user_id,
                    'soal_id' => $request->soal_id,
                    'quiz_id' => $request->quiz_id,
                    'status' => 1,

                ]);
            }
            else{
                Jawaban::Create([
                    'jawaban' => $request->jawaban,
                    'user_id' => $request->user_id,
                    'soal_id' => $request->soal_id,
                    'quiz_id' => $request->quiz_id,
                    'status' => 0,

                ]);
            }

        }


       }
}
