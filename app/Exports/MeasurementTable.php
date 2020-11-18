<?php

namespace App\Exports;

use App\Measurement;
use App\Patient;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class MeasurementTable implements FromView, ShouldAutoSize
{
    protected $patient;

    public function __construct(Patient $patient){
        $this->patient = $patient;
    }

    public function view():View
    {
        return view('excel.measurements',[
            'measurements' => Measurement::where('patient_id', $this->patient->id)->get()
        ]);
    }
}
