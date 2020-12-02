<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Cid;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use Excel;
use App\Exports\PatientTable;
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
        return view('patients.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patient = new Patient();
        return view('patients.create',compact('patient'));
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
        foreach($request->cid_id as $key => $code){
            $request->cid_id[$key] = $cids->where('code', $code)->first()->id;
        }
        $patient = Patient::create($request->all());
        $patient->cids()->attach($request->cid_id);
        return redirect()->route('patients.index')->with('success',true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('patients.show',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit',compact('patient'));
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
        foreach($request->cid_id as $key => $code){
            $request->cid_id[$key] = $cids->where('code', $code)->first()->id;
        }
        $patient->update($request->all());
        $patient->cids()->sync($request->cid);
        return redirect()->route('patients.index')->with('success',true);
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
        return redirect()->route('patients.index')->with('success',true);
    }


    public function excel(){
        return Excel::download(new PatientTable, 'resumo.xlsx', 'Html');
    }
}
