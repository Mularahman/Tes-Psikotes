<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('role','member')->OrderBy('id','asc')->get();
        if(request('search')){
            $data = User::where('role','member')->OrderBy('id','asc')->where('name','LIKE','%'.request('search'). '%')->get();

         }
        return view('admin.datapeserta.peserta',[
            'data' => $data,
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $data['password'] =
        Hash::make($data['password']);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        return back()->with('success', 'Berhasil Menambahkan Data Peserta !');
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
        return view('admin.datapeserta.edit',[
            'data' =>$data
        ]);
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
         ]);
         $d = User::FindOrfail($id);
         $d->update($data);

         return
         redirect('/peserta')->with('success', 'Berhasil Mengedit Data Peserta !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = User::FindOrfail($id);

        if($d->image){
            Storage::delete($d->image);

        }
        $d->delete();
        return
        redirect('/peserta')->with('success','Berhasil Mendelete Data Peserta !');

    }
}
