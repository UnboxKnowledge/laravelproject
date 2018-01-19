<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SampleModel extends Model {

	protected $table = 'useraccount';
	
	function getallusers($data){
		$role = $data['role'];
		$result = DB::table('useraccount')->insertGetId(
			array('role' => $role)
		);
		return $result;	
	}

}
