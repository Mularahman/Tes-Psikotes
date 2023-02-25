<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Soal;
use App\Models\Hasil;
use App\Models\Jawaban;
use App\Models\Pesertaquiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function home()
    {
        $data = Quiz::with('soals','quizuser')->get();
        $quizuser = Pesertaquiz::with('user','quiz')->where('user_id',auth()->id())->get();

        return view('index',[
            'data' => $data,
            'quizuser' => $quizuser,
        ]);
    }

    public function numerik(Quiz $quiz)
    {
            // $data = Quiz::with('soals')->find($id);
            $quiz->load('soals');
                return
                view('tes.numerik',[
                    'data' => $quiz
                ]);
    }

    public function quiz(Request $request,$userid,Quiz $quiz, $token)
    {

         $data = Soal::with('quiz','jawab')->where('quiz_id',$quiz->id)->where('no',$token)->first();

         if(Soal::where('quiz_id',$quiz->id)->where('no',$data->no+1)->first()){
            $next = Soal::where('quiz_id',$quiz->id)->where('id','>',$data->id)->first();
         }
         else{
            $next ='';
         }
         if(Soal::where('quiz_id',$quiz->id)->where('no',$data->no-1)->first()){
            $previous = Soal::where('quiz_id',$quiz->id)->where('id',$data->id-1)->first();
         }

         else{
            $previous ='';
         }

         $quiz = Quiz::with('soals','soals.jawab')->find($quiz->id);
         $jawaban = Jawaban::with('quiz','user','soal')->where('quiz_id',$quiz->id)->where('user_id', $userid)->where('soal_id', $data->id)->first();
         $jawabans = Jawaban::with('quiz','user','soal')->where('quiz_id',$quiz->id)->where('user_id', $userid)->get();

        session(['quiz_id' => $quiz->id]);
        session(['user' => auth()->user()->id ]);


        return view('quiz.quiz', [
            'userid' => $userid,
            'data' => $data,
            'next' => $next,
            'previous' => $previous,
            'quiz' => $quiz,
            'jawaban' => $jawaban,
            'jawabans' => $jawabans,

        ]);
    }



    public function selesai()
    {
        $quiz = Quiz::with('soals', 'soals.jawab')->find(session('quiz_id'));

        $soal = $quiz->soals;

        $jawaban = $soal->map(function ($item) {
            return $item->jawaban;
        });
        $totalsoal = $soal->count();

        $jawabanbenar = Jawaban::where('user_id',auth()->user()->id)->where('quiz_id',$quiz->id)->where('status', 1)->get()->count();

        $hasil = $jawabanbenar / count($soal) * 100;
        $hasilakhir = round($hasil);

        DB::table('hasils')->insert([
            'quiz_id' => $quiz['id'],
            'user_id' => auth()->user()->id,
            'benar' => $jawabanbenar,
            'nilai' => $hasilakhir,
            'status' => 1
        ]);
        DB::table('pesertaquizzes')->where('quiz_id',$quiz['id'])->where('user_id',auth()->user()->id)->update([
            'status' => 1
        ]);

        DB::table('users')->where('id',auth()->user()->id)->update([
            'status' => 1
        ]);


        return view('tes.hasil',[
            'quiz' => $quiz,
            'hasilakhir' => $hasilakhir,
            'jawabanbenar' => $jawabanbenar,
            'totalsoal' => $totalsoal,
        ]);

    }

    public function hasil(Quiz $quiz)
    {


        $quiz->load('soals','soals.jawab','hasil');
        $hasil = $quiz->hasil->where('user_id',auth()->id());


        return view('tes.hasils',[
            'quiz' => $quiz,
            'hasil' => $hasil,
        ]);

    }

}
