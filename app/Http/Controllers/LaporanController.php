<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Exports\HasilExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class LaporanController extends Controller
{
    public function results(Request $request)
    {
        $data = Hasil::with('user','quiz')->orderBy('quiz_id','asc')->get();
        if(request('search')){
            $data = Hasil::with('user','quiz')->orderBy('quiz_id','asc')->where('nilai','LIKE','%'.request('search'). '%')->get();

         }
        return view('admin.results',[
            'data' => $data
        ]);
    }
    public function export(Request $request)
    {
        return Excel::download(new HasilExport, 'hasil.xlsx');
    }

    public function cetak()
    {
        $hasil = Hasil::with('user','quiz')->orderBy('quiz_id','asc')->get();

        $pdf = PDF::loadview('admin.datalaporan.results_pdf',['data'=>$hasil]);
    	return $pdf->stream();
    }
}
