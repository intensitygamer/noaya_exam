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
     ]);

    $companies 			= new Companies([
      
      'name'      => $request->post('name'),
      'email'     => $request->post('email'),
      'website' 	=> $request->post('website')

    ]);
    

    $fileName = time().'.'.$request->logo_image_directory->extension();  

    $request->logo_image_directory->move(storage_path('uploads/public'), $fileName);

    $companies->save();

    return response()->json(['companies' => $companies, 'message' => 'Company Saved Successfully!'], 200);
    
  }

  public function update(Request $request, $id){
  	    
      $request->validate([
        'name'=>'required',
       ]);
       

    $companies->where(['id'=>$request->id])->update($request->all());

    return response()->json(['companies' => $companies, 'message' => 'Company Saved Successfully!'], 200);
	}

	public function delete(Request $request){
        
      $companies = Companies::find($request->id);
		
      $companies->delete();

	    return response()->json(null, 204);
	}

}
