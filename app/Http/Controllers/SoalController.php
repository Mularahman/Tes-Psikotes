<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Soal;
use App\Imports\SoalImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Soal::with('quiz')->where('quiz_id',$id)->get();
        return view('admin.datasoal.soal', [
            'data' => $data,
            'id' => $id
        ]);
    }

    public function import(Request $request, $id)
    {

        Excel::import(new SoalImport($id),$request->file);

        return redirect()->route('soal',$id)->with('success', 'Berhasil Menambah soal!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.datasoal.tambahsoal', [
            'id' => $id
        ]);
    }

    // public function import(Request $request, $id)
    // {


    //     Excel::import(new SoalImport($id),$request->file);

    //     return redirect()->route('soal',$id)->with('success', 'Berhasil Menambah soal!');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $this->validate($request,[
            'no' => 'required',
            'soal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'jawaban' => 'required'

        ]);

        Soal::create([
            'no' => $data['no'],
            'quiz_id' => $id,
            'soal' => $data['soal'],
            'a' => $data['a'],
            'b' => $data['b'],
            'c' => $data['c'],
            'd' => $data['d'],
            'jawaban' => $data['jawaban']

        ]);

        return redirect()->route('soal',$id)->with('success', 'Berhasil Menambah soal!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Soal::FindOrfail($id);
        return view('admin.datasoal.edit',[
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $this->validate($request,[
            'no' => 'required',
            'soal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'jawaban' => 'required'

        ]);



        $d = Soal::FindOrfail($id);
        $d->update($data);


        return redirect()->route('soal',$d->quiz->id)->with('success', 'Berhasil Mengedit soal!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = Soal::FindOrfail($id);
        $d->delete();

        return redirect()->route('soal',$d->quiz->id)->with('success', 'Berhasil Menghapus soal!');

    }

    public function cetak($id)
    {

        $data = Soal::with('quiz', 'jawab')->where('quiz_id',$id)->get();
        $quiz = Quiz::where('id',$id)->first();
        view()->share([
            'data' => $data,
            'quiz' => $quiz
        ]);

        $pdf = PDF::loadview('admin.datalaporan.datasoal_pdf');
    	return $pdf->stream();

    }
}
