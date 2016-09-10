<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Permission;

use App\DataTables\PermissionDataTable;

class PermissionController extends Controller
{
    public function index(PermissionDataTable $dataTable){
    	return $dataTable->render('backend.permission.index');
    }

    public function create(){
    	return view('backend.permission.create');
    }

    public function store(Request $request){
    	Permission::create(['nama_permission'=>strtolower($request->input('nama_permission'))]);
    	return redirect()->route('permission.index');
    }

    public function edit($id){
    	$permission=Permission::find($id);
    	return view('backend.permission.edit',compact('permission'));
    }

    public function update(Request $request,$id){
    	Permission::where('id','=',$id)
    	->update(['nama_permission'=>$request->input('nama_permission')]);

    	return redirect()->route('permission.index');
    }

    public function destroy($id){
    	$permission=Permission::find($id);
    	$permission->delete();
    	return redirect()->route('permission.index');	
    }
}
