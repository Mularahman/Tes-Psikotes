<?php

namespace App\Exports;

use App\Models\Hasil;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class NilaiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function __construct(String $form, String $to){
    //     $this->from = $form;
    //     $this->to = $to;

    // }

    public function view(): View
    {
        return view('admin.hasilquiz.nilai_excel',[
            'data' => Hasil::with('quiz', 'user')->where('quiz_id',$id)->get()
        ]);
    }
}
