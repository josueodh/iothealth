<?php

namespace App\Exports;

use App\Diary;
use App\Patient;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class DiaryTable implements FromView
{

    protected $patient;

    public function __construct(Patient $patient){
        $this->patient = $patient;
    }


    public function view():View{
        return view('excel.diaries',[
            'diaries' => Diary::where('patient_id', $this->patient->id)->get()
        ]);
    }
}
