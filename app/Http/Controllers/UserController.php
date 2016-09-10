<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\UserRequest;

use App\Models\User;

use Validator,Auth,Session;


class UserController extends Controller
{
	public function __construct(User $model_user){
		$this->model_user=$model_user;
	}

    public function login()
    {
    	return view('backend.layout.login');
    }

    public function authenticate(Request $request)
    {
    	$rules=[
    	'nik'=>'required',
    	'password'=>'required'
    	];
        
        $data=[
        	'nik'=>$request->input('nik'),
        	'password'=>$request->input('password')
        	];



       if (Auth::attempt($data)) {
       		Session::flash("flash_notification", [
			"level"=>"success",
			"message"=>"Welcome ".Auth::User()->nama
			]);
            return redirect()->intended('user/create');
        }

        Session::flash("flash_notification", [
		"level"=>"danger",
		"message"=>"NIK dan Password tidak cocok"
		]);
       

        return redirect()->back();

    }

    public function create()
    {
    	return view('backend.user.create');
    }

    public function store(UserRequest $request)
    {
    	$data=[
    		'nik'=>$request->input('nik'),
    		'nama'=>$request->input('nama'),
    		'password'=>bcrypt($request->input('password')),
    		'password_confirmation'=>$request->input('password_confirmation')
    	];

    	 $validator=Validator::make($data,$request->rules());

         if ($validator->fails()){
              return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

    	User::create($data);

    	return redirect()->route('user.create');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
       	Session::flash("flash_notification", [
		"level"		=>	"success",
		"message"	=>	"Anda Berhasil Logout"
		]);
        return redirect()->route('login');
    }

    public function cetakMobil()
    {
    	return $this->model_user->mobil();
    }
}
