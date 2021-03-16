<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employees; 

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use Mail;


class EmployeesAPIController extends Controller
{
  /**
     * Display a listing of employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::all();
 
        return response([ 'employees' => $employees, 'message' => 'Retrieved successfully'], 200);
    }    

	public function show(Request $request){

        $employees = Employees::find($request->id);

        return response([ 'employees' => $employees, 'message' => 'Retrieved successfully'], 200);

	}

	public function store(Request $request){

		$request->validate([
			'first_name'=>'required',
			'last_name'=>'required',
			'email'=>'required'
		]);

		$hashed_random_password = Str::random(8);

        $employees 			= new Employees([
            'first_name' 	=> $request->post('first_name'),
            'last_name' 	=> $request->post('last_name'),
            'company_id' 	=> $request->post('company_id'),
            'email' 		=> $request->post('email'),
            'phone' 		=> $request->post('phone'),
            'password' 		=> $hashed_random_password,
            'is_active' 	=> $request->post('is_active')
        ]);

        $employees->save();
		

		$data['name']= $request->post('first_name') . ' '. $request->post('last_name');
		
		$data['company_id']= $request->post('company_id');

		$data['email']= $request->post('email');

		$data['password'] = $hashed_random_password;
		
		$data['phone']= $request->post('phone');
 
      	Mail::send('emails.mail', ['data' => $data], function($message) use ($data) {
        
        	$message->to($data['email'], $data['name'])->subject
            ('Noaya User Creation');
        	$message->from('noaya@gmail.com','Vinz Gamer');
      	
      	});

        return response()->json($employees, 201);
    }

   public function update(Request $request, Employees $employees){
	    
	    $employees->update($request->all());

		return response()->json($employees, 200);
	}

	public function delete(Request $request){
        
        $employees = Employees::find($request->id);
		
		$employees->delete();

	    return response()->json(null, 204);
	}
}
