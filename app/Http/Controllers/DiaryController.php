<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Patient;
use Illuminate\Http\Request;
use Excel;
use App\Exports\DiaryTable;
use Yajra\DataTables\DataTables;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diaries = Diary::all();
        return view('diaries.index', compact('diaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diary = new Diary();
        $patients = Patient::all();
        return view('diaries.create', compact('diary', 'patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        Diary::create($request->all());
        return redirect()->route('diaries.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function show(Diary $diary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function edit(Diary $diary)
    {
        $patients = Patient::all();
        return view('diaries.edit', compact('diary', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diary $diary)
    {
        $diary->update($request->all());
        return redirect()->route('diaries.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diary $diary)
    {
        $diary->delete();
        return redirect()->route('diaries.index')->with('success', true);
    }


    public function excel(Patient $patient)
    {
        return Excel::download(new DiaryTable($patient), $patient->name . '-diario.xlsx', 'Html');
    }

    public function service()
    {
        $diaries = Diary::with('patient')->select('diaries.*');
        return Datatables::of($diaries)
            ->editColumn('date', function ($diary) {
                return date('d/m/Y', strtotime($diary->date));
            })
            ->editColumn('sleep', function ($diary) {
                return date('H:i', strtotime($diary->sleep));
            })
            ->addColumn('action', function ($diary) {
                $actionBtn = '';
                $actionBtn = $actionBtn . '<a href="' . route('diaries.edit', $diary->id) . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
                $actionBtn = $actionBtn . '
                <form  action="' .  route('diaries.destroy', $diary->id)  . '" method="post">
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
