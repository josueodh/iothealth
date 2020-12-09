<?php

namespace App\Exports;

use App\Patient;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class PatientsTable implements FromView
{


    public function view():View{
        return view('excel.allUsers',[
            'patients' => Patient::all()
        ]);
    }
}
