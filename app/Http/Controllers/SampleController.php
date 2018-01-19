<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\SampleModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class SampleController extends Controller {

	protected $samplemodel;
	 
	public function __construct(SampleModel $samplemodel)
	{
		$this->samplemodel = $samplemodel;
	}
	
	public function addRole()
	{
		$input = Input::all();
		$validator = Validator::make($input, [
			'role' => 'required',
		]);
		
		if ($validator->fails())
		{
			return response()->json(array("message" => $validator->messages()->first()),200);
		}
		else{
			$result = $this->samplemodel->getallusers($input);
			if(count($result)>0){
				return response()->json(array("insertid" => $result),200);
			}
			else{
				return response()->json(array("message" => "error occurred"),200);
			}
		}
	}

}
