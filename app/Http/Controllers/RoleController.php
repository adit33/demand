<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Permission;

use App\Models\Role;

use App\DataTables\RoleDataTable;



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

    }

    public function destroy($id){
        $role=Role::find($id);
        $role->delete();
        return redirect()->route('role.index');
    }
}
