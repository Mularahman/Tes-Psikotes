<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Soal;
use App\Models\User;
use App\Models\Hasil;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Pesertaquiz;
use Illuminate\Http\Request;
use App\Exports\RatarataExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
    $datahasil = Hasil::with('user')->get();
    $datauser = User::where('role','member')->get();
    $datasoal = Soal::all();
    $dataquiz = Quiz::with('soals','quizuser','hasil')->get();
    $dataquizuser = Pesertaquiz::with('user')->get();


    $nilaituntas = Hasil::with('user')->where('nilai', '>' , 69)->get();
    $nilaitidaktuntas = Hasil::with('user')->where('nilai', '<' , 70)->get();
    $ratarata = User::withcount('hasil')->with('hasil')->where('status', 1)->get();

    $mengerjakan = Pesertaquiz::with('user','quiz')->where('status', 1)->get();
    $belummengerjakan = Pesertaquiz::with('user','quiz')->where('status', 0)->get();

    $proggress = 0;
    if($mengerjakan->count() > 0){
        $proggress = $mengerjakan->count() / $dataquizuser->count() * 100 ;
    }
    $proggress2 = 0;
    if($belummengerjakan->count() > 0){
        $proggress2 = $belummengerjakan->count() / $dataquizuser->count() * 100 ;
    }
    // dd($mengerjakan);

        return view('admin.dashboard',[

            'datahasil' => $datahasil,
            'datauser' => $datauser,
            'datasoal' => $datasoal,
            'dataquizuser' => $dataquizuser,
            'dataquiz' => $dataquiz,
            'tuntas' => $nilaituntas,
            'tidaktuntas' => $nilaitidaktuntas,
            'ratarata' => $ratarata,
            'mengerjakan' => round($proggress),
            'belummengerjakan' => round($proggress2),
        ]);
    }

    public function tuntas(){
        $data = Hasil::with('user')->where('nilai', '>' , 69)->orderBy('quiz_id', 'asc')->get();


        return view('admin.dashboard.usertuntas',[
            'data' => $data
        ]);
    }
    public function tidaktuntas(){
        $data = Hasil::with('user')->where('nilai', '<' , 70)->orderBy('quiz_id', 'asc')->get();

        return view('admin.dashboard.usertidaktuntas',[
            'data' => $data
        ]);
    }
    public function ratarata(){

        $data = User::withcount('hasil')->withsum('hasil','nilai','sum')->with('hasil')->where('status', 1)->get();


        return view('admin.dashboard.ratarata',[
            'data' => $data,

        ]);
    }
    public function export(Request $request)
    {
        return Excel::download(new RatarataExport, 'nilai_rata-rata.xlsx');
    }

    public function cetak()
    {

        $data = User::withcount('hasil')->withsum('hasil','nilai','sum')->with('hasil')->where('status', 1)->get();

        view()->share('data', $data);

        $pdf = PDF::loadview('admin.dashboard.ratarata_pdf');
    	return $pdf->stream();
    	// return view('admin.details.ratarata_pdf',[
        //     'data' =>$data
        // ]);
    }
    public function cetaktuntas()
    {

        $data = Hasil::with('user')->where('nilai', '>' , 69)->get();

        view()->share('data', $data);

        $pdf = PDF::loadview('admin.dashboard.tuntas_pdf');
    	return $pdf->stream();


    }
    public function cetaktidaktuntas()
    {

        $data = Hasil::with('user')->where('nilai', '<' , 70)->get();

        view()->share('data', $data);

        $pdf = PDF::loadview('admin.dashboard.tidaktuntas_pdf');
    	return $pdf->stream();

    }
}
