<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Validator;

class LoginController extends Controller
{
    public function showLoginForm(){
    	return view('login');
    }

    public function submitLoginForm(Request $request){
		$validator = $this->validated($request);
		if ($validator->fails()) {
			return redirect('login')
		            ->withErrors($validator)
		            ->withInput();
		}
		$checklogin = $this->checklogin($request);

    }

    public function validated(Request $request){
    	return Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function checklogin(Request $request){
    	$user = User::where('username',$request->username)->first();
    	if (!empty($user)) {
    		die('pass');
    	}else{
    		die('error');
    	}
    }


}
