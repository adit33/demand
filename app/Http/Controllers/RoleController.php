<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Permission;

use App\Models\Role;

use App\DataTables\RoleDataTable;

use Validator;



class RoleController extends Controller
{
    public function index(RoleDataTable $dataTable){
        return $dataTable->render('backend.role.index');
    }

    public function create(){
        $permissions=Permission::all();
    	return view('backend.role.create',compact('permissions'));
    }

    public function store(Request $request){
        $nama_role=$request->input('nama_role');
        $nama_permission=$request->input('nama_permission');

        $role=Role::create([
            'nama_role'=>$nama_role,
            ]);
        
        for ($i=0; $i <count($nama_permission) ; $i++) { 
            $role->addPermission($nama_permission[$i]);
        }
        return dd($request->all());
    }

    public function edit($id){
        $permissions=Permission::all();
        $role=Role::find($id);
        $permission_role=$role->permissions;

        return view('backend.role.edit',compact('permission_role','role','permissions'));
    }

    public function update(Request $request,$id){
         $role=Role::find($id);
        
        $rules=[
            'nama_role'=>'required|unique:role,nama_role,'.$role->id.',id',

        ];

        $pesan=[
            'nama_role.required'=>'nama role harus di isi',
            'nama_role.unique'=>'nama role sudah ada'
        ];

         $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
        return redirect()->back()
            ->withErrors($validator);
        }

        $nama_permission=$request->input('nama_permission');
        $permission_role=$role->permissions;
         $permission = Permission::whereIn('nama_permission', $nama_permission)->pluck('id')->toArray();        

            $role->nama_role=$request->input('nama_role');
            $role->save();
            
            $role->updatePermission($permission);

        return redirect('role');
    }

    public function destroy($id){
        $role=Role::find($id);
        $role->delete();
        return redirect()->route('role.index');
    }
}
