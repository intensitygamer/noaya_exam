<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Companies extends Controller
{
    //

    public function index()
    {
        return Companies::all();
    }

    public function show(Companies $companies)
    {
        return $companies;
    }

    public function store(Request $request)
    {
        $companies = Companies::create($request->all());

        return response()->json($companies, 201);
    }

    public function update(Request $request, Companies $companies)
    {
        $companies->update($request->all());

        return response()->json($companies, 200);
    }

    public function delete(Companies $companies)
    {
        $companies->delete();

        return response()->json(null, 204);
    }


}
