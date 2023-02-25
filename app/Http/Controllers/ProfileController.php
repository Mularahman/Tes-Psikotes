<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function myprofile($id){
        $data = User::where('id',$id)->first();

        return view('myprofile',[
            'data' => $data,
            'id' => $id
        ]);
    }

    public function updateprofile(Request $request, $id)
    {
        
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'image' => 'required|file|max:800'
        ]);


        $user = User::find($id);

            if($request->file('image')){
                if($request->oldimage){
                    Storage::delete($request->oldimage);
                }
                $data['image'] = $request->file('image')->store('photo-profile');
            }

            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'image' => $data['image'],
            ]);


            return redirect()->back()->with('successs', 'Data update successfully!');

    }

    public function updatePassword(Request $request ,$id)
    {

        $data = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',

        ]);
        $user = User::find($id);

        if (!Hash::check($data['old_password'], $user->password)) {
            return redirect()->back()->with('error', 'Password salah!');
        }

        if($data['new_password'] != $data['confirm_password']) {
            return redirect()->back()->with('error', 'Password konfirmasi salah!');
        }

        $user->password = Hash::make($data['new_password']);
        $user->save();

        return redirect()->back()->with('success', 'Password Berhasil diganti!');
    }

    public function nilai($id){
        $data = Hasil::with('user')->where('user_id',$id)->get();
        $sum = User::withsum('hasil','nilai','sum')->where('id',$id)->first();

        $nilai = 0;
        if($data->count() > 0){
            $nilai = $sum->hasil_sum_nilai / $data->count();
        }

        return view('nilai',[
            'data' => $data,
            'nilai' => round($nilai),
        ]);
    }
}
