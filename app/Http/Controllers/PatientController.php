<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Cid;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use Excel;
use App\Exports\PatientsTable;
use App\Exports\PatientTable;
use Yajra\DataTables\DataTables;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patient = new Patient();
        return view('patients.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        $cids = Cid::all();
        $request->cid_id = explode(',', $request->cid_id);
        foreach ($request->cid_id as $key => $code) {
            $request->cid_id[$key] = $cids->where('code', $code)->first()->id;
        }
        $patient = Patient::create($request->all());
        $patient->cids()->attach($request->cid_id);
        return redirect()->route('patients.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient, Request $request)
    {
        if (request('date')) {
            $day = request('date');
        } else {
            $day = $patient->days_patient_measurement->first();
        }
        $temperature_chart = Patient::TemperatureChart($day, $patient);
        $heart_rate_chart = Patient::HeartRate($day, $patient);
        $arterial_frequency_min = Patient::ArterialFrequencyMin($day, $patient);
        $arterial_frequency_max = Patient::ArterialFrequencyMax($day, $patient);
        $blood_saturation = Patient::BloodSaturation($day, $patient);
        $sleep = Patient::Sleep($day, $patient);
        $walk = Patient::Walk($patient);
        return view('patients.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $cids = Cid::all();
        $request->cid_id = explode(',', $request->cid_id);
        foreach ($request->cid_id as $key => $code) {
            $request->cid_id[$key] = $cids->where('code', $code)->first()->id;
        }
        $patient->update($request->all());
        $patient->cids()->sync($request->cid);
        return redirect()->route('patients.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', true);
    }


    public function excel()
    {
        return Excel::download(new PatientsTable, 'resumo.xlsx', 'Html');
    }


    public function excelPatient(Patient $patient)
    {
        return Excel::download(new PatientTable($patient), $patient->name . '-diario.xlsx', 'Html');
    }

    public function service()
    {
        $patients = Patient::query();
        return Datatables::of($patients)
            ->addColumn('action', function ($patient) {
                $actionBtn = '';
                $actionBtn = $actionBtn . '<a href="' . route('patients.show', $patient->id) . '" class="btn btn-secondary ml-1"><i class="fas fa-notes-medical"></i></a>';
                $actionBtn = $actionBtn . '<a href="' . route('patients.edit', $patient->id) . '" class="btn btn-primary ml-1"><i class="fas fa-edit"></i></a>';
                $actionBtn = $actionBtn . '
                <form  action="' .  route('patients.destroy', $patient->id)  . '" method="post">
                    <input type="hidden" name="_token" value="' .  request()->session()->token() . '">
                    <input type="hidden" name="_method" value="delete">
                    <button type="button"  class="btn btn-danger btn-delete"><i class="fas fa-trash-alt"></i></button>
                </form>
            ';
                return $actionBtn;
            })
            ->toJson();
    }
}
