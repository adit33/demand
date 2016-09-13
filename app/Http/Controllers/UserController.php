<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\UserRequest;

use App\Models\User;

use App\DataTables\UserDataTable;

use Validator,Auth,Session,Crypt;


class UserController extends Controller
{
	public function __construct(User $model_user){
		$this->model_user=$model_user;
	}

    public function index(UserDataTable $dataTable){
        return $dataTable->render('backend.user.index');
    }

    public function edit($id){
        $id=Crypt::decrypt($id);
        $user=User::find($id);
        
        $usr=$user->roles;
        foreach ($usr as $user_role) {
        $nama_role=$user_role->nama_role;
        } 

        return View('backend.user.edit',compact('user','nama_role'));
    }

    public function update($id,Request $request){
        $user=User::find($id);
        $user->nik=$request->input('nik');
        $user->nama=$request->input('nama');
        $user->password=bcrypt($request->input('password'));
        $user->updateRole($request->input('nama_role'));
        $user->save();

    }

    public function destroy($id){
        $user=User::find($id);

        $usr=$user->roles;
        
        foreach ($usr as $user_role) {
        $nama_role=$user_role->nama_role;
        } 

        $user->revokeRole($nama_role);
        $user->delete();

        return redirect()->route('user.index');
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
    		'password'=>$request->input('password'),
    		'password_confirmation'=>$request->input('password_confirmation'),
            'nama_role'=>$request->input('nama_role')
    	];

    	 $validator=Validator::make($data,$request->rules());

         if ($validator->fails()){
              return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }
        $user=new User;
        
        $user->nik=$request->input('nik');
        $user->nama=$request->input('nama');
        $user->password=bcrypt($request->input('password'));
    	$user->assignRole($request->input('nama_role'));
        $user->save();

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

}
