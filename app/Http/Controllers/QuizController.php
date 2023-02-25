<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Quiz::all();
        return view('admin.dataquiz.quiz',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = $this->validate($request,[
            'quiz' => 'required',
            'deskripsi' => 'required',
            'jenisquiz' => 'required',
            'info' => 'required',
            'info2' => 'required',
            'info3' => 'required',
            'date' => 'required',
            'time' => 'required',


        ]);
        Quiz::create([
            'quiz' => $data['quiz'],
            'deskripsi' => $data['deskripsi'],
            'jenisquiz' => $data['jenisquiz'],
            'info' => $data['info'],
            'info2' => $data['info2'],
            'info3' => $data['info3'],
            'token' => Str::random(5),
            'slug' => $data['quiz'],
            'date' => $data['date'],
            'time' => $data['time'],
            'status' => 1,

        ]);

        return back()->with('success', 'Berhasil Menambah data !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'quiz' => 'required',
            'deskripsi' => 'required',
            'jenisquiz' => 'required',
            'info' => 'required',
            'info2' => 'required',
            'info3' => 'required',
            'date' => 'required',
            'time' => 'required',

        ]);

        $d = Quiz::FindOrfail($id);
        $d->update($data);

        return
        redirect('/quizadmin')->with('success', 'Berhasil Mengedit Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = Quiz::FindOrfail($id);
        $d->delete();

        return
        redirect('/quizadmin')->with('success','Berhasil Menghapus data!');

    }
}
