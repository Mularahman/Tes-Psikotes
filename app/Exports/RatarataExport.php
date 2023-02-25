<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class RatarataExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.details.ratarata_excel',[
            'data' => User::withcount('hasil')->withsum('hasil','nilai','sum')->with('hasil')->where('status', 1)->get()
        ]);
    }
}
