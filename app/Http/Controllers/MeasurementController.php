<?php

namespace App\Http\Controllers;

use App\Measurement;
use App\Patient;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
        return view('measurements.index', compact('measurements'));
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
        return view('measurements.create', compact('measurement', 'patients'));
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
        return redirect()->route('measurements.index')->with('success', true);
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
        return view('measurements.show', compact('measurement', 'patients'));
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
        return view('measurements.edit', compact('measurement', 'patients'));
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
        return redirect()->route('measurements.index')->with('success', true);
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
        return redirect()->route('measurements.index')->with('success', true);
    }

    public function service()
    {
        $measurements = Measurement::with('patient')->select('measurements.*');
        return Datatables::of($measurements)
            ->addColumn('date', function ($measurement) {
                return date('d/m/Y', strtotime($measurement->time));
            })
            ->addColumn('action', function ($measurement) {
                $actionBtn = '';
                $actionBtn = $actionBtn . '<a href="' . route('measurements.show', $measurement->id) . '" class="btn btn-secondary ml-1"><i class="fas fa-notes-medical"></i></a>';
                $actionBtn = $actionBtn . '<a href="' . route('measurements.edit', $measurement->id) . '" class="btn btn-primary ml-1"><i class="fas fa-edit"></i></a>';
                $actionBtn = $actionBtn . '
                <form  action="' .  route('measurements.destroy', $measurement->id)  . '" method="post">
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
