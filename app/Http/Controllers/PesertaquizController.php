<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Hasil;
use App\Models\Jawaban;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pesertaquiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaquizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Pesertaquiz::with('quiz', 'user')->where('quiz_id',$id)->get();
        if(request('search')){
            $data = User::where('role','member')->OrderBy('id','asc')->where('name','LIKE','%'.request('search'). '%')->get();

         }

        return view('admin.datapesertaquiz.enrolled', [
            'data' => $data,
            'id' => $id
        ]);
    }


    public function create($id)
    {
        $data = User::with('userquizs')->where('role','member')->get();
        if(request('search')){
            $data = User::where('role','member')->OrderBy('id','asc')->where('name','LIKE','%'.request('search'). '%')->get();

         }
        return view('admin.datapesertaquiz.enrolledpeserta', [
            'data' => $data,
            'id' => $id
        ]);
    }

    public function store(Request $request, $id)
    {
        foreach ($request->user as $key=>$name) {
            $insert = [
                'quiz_id' => $id,
                'user_id' => $request->user[$key]
            ];
            DB::table('pesertaquizzes')->insert($insert);
        }


        return redirect()->route('pesertaquiz',$id)->with('success', 'Berhasil Menambah Peserta Quiz!');

    }
    public function destroy($id)
    {

        $datasesi = Pesertaquiz::FindOrfail($id);
        $hasil = Hasil::where('user_id',$datasesi->user_id)->where('quiz_id',$datasesi->quiz_id)->delete();
        $jawaban = Jawaban::where('user_id',$datasesi->user_id)->where( 'quiz_id',$datasesi->quiz_id)->delete();

        $datasesi->delete();



        return redirect()->route('pesertaquiz',$datasesi->quiz_id)->with('success', 'Berhasil Menghapus Peserta Quiz!');

    }

    public function delete(Request $request){

        $data = Pesertaquiz::whereIn('id', $request->data)->get();
        foreach ($data As $item){
            Hasil::where('user_id',$item->user_id)->where('quiz_id',$item->quiz_id)->delete();
            Jawaban::where('user_id',$item->user_id)->where( 'quiz_id',$item->quiz_id)->delete();

            $item->delete();
        }

    }

    public function hasil($id)
    {
        $data = Hasil::with('quiz', 'user')->where('quiz_id',$id)->orderBy('nilai','desc')->get();
        $quiz = Quiz::where('id',$id)->first();


          if(request('search')){
            $data = Hasil::with('quiz', 'user')->where('quiz_id',$id)->orderBy('nilai','desc')->where('nilai','LIKE','%'.request('search'). '%')->get();

         }

        return view('admin.hasilquiz.hasil', [
            'data' => $data,
            'quiz' => $quiz,
            'id' => $id,
        ]);
    }



    public function exportuser(Request $request)
    {
        return Excel::download(new RatarataExport, 'nilai_rata-rata.xlsx');
    }

    public function cetakuser($id)
    {

        $data = Pesertaquiz::with('quiz', 'user')->where('quiz_id',$id)->get();

        $quiz = Quiz::where('id',$id)->first();
        view()->share([
            'data' => $data,
            'quiz' => $quiz
        ]);

        $pdf = PDF::loadview('admin.datalaporan.enrolle_pdf');
    	return $pdf->stream();
    	// return view('admin.enrolle.enrolle_pdf',[
        //     'data' =>$data,
        //     'quiz' =>$quiz,
        // ]);
    }

    public function export(Request $request, $id)
    {

        return Excel::download(new NilaiExport, 'nilai_quiz.xlsx',['id' => $id]);
    }
    public function cetak($id)
    {

        $data = Hasil::with('quiz', 'user')->where('quiz_id',$id)->orderBy('nilai','desc')->get();
        $quiz = Quiz::where('id',$id)->first();
        view()->share([
            'data' => $data,
            'quiz' => $quiz
        ]);

        $pdf = PDF::loadview('admin.datalaporan.hasilperquiz_pdf');
    	return $pdf->stream();
    	// return view('admin.hasilquiz.hasilperquiz_pdf',[
        //     'data' =>$data,
        //     'quiz' =>$quiz,
        // ]);
    }
}
