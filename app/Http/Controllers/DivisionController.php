<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::orderBy('name', 'asc')->get();

        return view('divisions.index', ['divisions' => $divisions]);
    }

    public function create()
    {
        $division = new Division();

        return view('divisions.create', ['division' => $division]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()) {
            $this->validate($request, [
                'code' => 'required',
                'name' => 'required',
                'address' => 'required',
                'postcode' => 'required'
            ]);

            $division = new Division;
            $division->fill($request->all());
            $division->save();

            return redirect()->route('division.index')
                ->with('success', 'Division was added successfully');
        } 

        return redirect()->route('division.index')->with('error', 'Error in adding new division');

    }

    public function show($id)
    {
        $division = Division::find($id);
        if(!$division) throw new ModelNotFoundException;

        return view('divisions.show', ['division' => $division]);
    }

    public function edit($id)
    {
        $division = Division::find($id);
        if(!$division)
            throw new ModelNotFoundException;

        return view('divisions.edit', ['division' => $division]);
    }

    public function update(Request $request, $id)
    {
        $division = Division::find($id);
        if(!$division)
            throw new ModelNotFoundException;

        $division->fill($request->all());
        $division->save();

        return redirect()->route('division.index');
    }

    public function destroy($divisionId) 
    {
        $findDivision = Division::find($divisionId);
        if($findDivision->delete()) {
            return redirect()->route('division.index')
            ->with('success', 'Division was deleted successfully');
        }
    }
}
