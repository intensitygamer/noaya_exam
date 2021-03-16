<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Companies; 

use Illuminate\Database\Eloquent\Model;


class CompaniesAPIController extends Controller
{
  /**
     * Display a listing of employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::all();
 
        return response([ 'companies' => $companies, 'message' => 'Retrieved successfully'], 200);
    }    

	public function show(Request $request){

        $companies = Companies::find($request->id);

        return response([ 'companies' => $companies, 'message' => 'Retrieved successfully'], 200);

	}

	public function store(Request $request){

		$request->validate([
			'name'=>'required',
      'email'=>'required'    
    ]);

    $companies 			= new Companies([
      
      'name'      => $request->post('name'),
      'email'     => $request->post('email'),
      'website' 	=> $request->post('website')

    ]);

    $companies->save();

    return response()->json($companies, 201);
    
  }

  public function update(Request $request, Companies $companies){
  	    
      $request->validate([
        'name'=>'required',
        'email'=>'required'    
      ]);
      
      $companies = Companies::find($id);
      
      $companies->name    =  $request->get('name');
      $companies->email   =  $request->get('email');
      $companies->website =  $request->get('website');

 

	    //$companies->where(['id'=>$request->id])->update($request->all());

		  return response()->json($companies, 200);
	}

	public function delete(Request $request){
        
      $companies = Companies::find($request->id);
		
      $companies->delete();

	    return response()->json(null, 204);
	}

}
