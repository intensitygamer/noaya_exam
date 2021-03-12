<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Employees extends Controller
{
    //

	    public function index()
	    {
	        return Employees::all();
	    }

	    public function show(Employees $employees)
	    {
	        return $employees;
	    }

	    public function store(Request $request)
	    {
	        $employees = Employees::create($request->all());

	        return response()->json($employees, 201);
	    }

	    public function update(Request $request, Employees $employees)
	    {
	        $employees->update($request->all());

	        return response()->json($employees, 200);
	    }

	    public function delete(Employees $employees)
	    {
	        $employees->delete();

	        return response()->json(null, 204);
	    }


}
