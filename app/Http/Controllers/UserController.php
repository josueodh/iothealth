<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('users.index')->with('success', true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        if ($request->password != '') {
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);
        return redirect()->route('users.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', true);
    }

    public function service()
    {
        $users = User::query();
        return Datatables::of($users)
            ->editColumn('is_admin', function ($user) {
                return $user->is_admin == 1 ? 'Sim' : 'Não';
            })
            ->addColumn('action', function ($user) {
                $actionBtn = '';
                $actionBtn = $actionBtn . '<a href="' . route('users.show', $user->id) . '" class="btn btn-secondary ml-1"><i class="fas fa-notes-medical"></i></a>';
                $actionBtn = $actionBtn . '<a href="' . route('users.edit', $user->id) . '" class="btn btn-primary ml-1"><i class="fas fa-edit"></i></a>';
                $actionBtn = $actionBtn . '
                <form  action="' .  route('users.destroy', $user->id)  . '" method="post">
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
