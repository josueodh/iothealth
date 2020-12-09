<?php

namespace App\Http\Controllers;

use App\Measurement;
use App\Patient;
use Illuminate\Http\Request;
use Excel;
use App\Exports\MeasurementTable;
class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measurements = Measurement::all();
        return view('measurements.index',compact('measurements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $measurement = new Measurement();
        $patients = Patient::all();
        return view('measurements.create',compact('measurement','patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Measurement::create($request->all());
        return redirect()->route('measurements.index')->with('success',true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function show(Measurement $measurement)
    {
        $patients = Patient::all();
        return view('measurements.show',compact('measurement','patients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function edit(Measurement $measurement)
    {
        $patients = Patient::all();
        return view('measurements.edit',compact('measurement','patients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measurement $measurement)
    {
        $measurement->update($request->all());
        return redirect()->route('measurements.index')->with('success',true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measurement $measurement)
    {
        $measurement->delete();
        return redirect()->route('measurements.index')->with('success',true);
    }

}
