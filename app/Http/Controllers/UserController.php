<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\User;
use Auth;

class UserController extends Controller
{
    //

    public function register_user(CreateUserRequest, $request){
    	$data = $request->only(['name', 'email', 'password']);
    	$data['password'] = bcrypt($data['password']);

    	$user = User::create($data);
    	$user->is_admin = 0;

    	return response()->json([
    		'user' => $user,
    		'token' => $user->createToken('bigStore')->accessToken,
    	])
    }

    public function login(LoginUserRequest, $request){
    	$status = 401;
    	$response = ['error' => 'Unauthorized'];

    	if(Auth::attempt($request->only(['email', 'password']))){
    		$status = 200;
    		$response = [
    			'user' => Auth::user();
    			'token' => Auth::user()->createToken('bigStore')->accessToken
    		]
    	}
    	return response()->json($response, $status);
    }


    public function index(){
    	return response()->json(User::with(['orders'])->get());
    }

    public function show(User $user){
    	return response()->json($user, 200);
    }

    public function showOrders(User $user)
        {
            return response()->json($user->orders()->with(['product'])->get());
        }

}
