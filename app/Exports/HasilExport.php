<?php

namespace App\Exports;

use App\Models\Hasil;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class HasilExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.datalaporan.results_pdf',[
            'data' => Hasil::with('user','quiz')->orderBy('quiz_id','asc')->get()
        ]);
    }
}
