<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Departement;

class DepartementController extends Controller
{
    public function create()
    {
    	return view('backend.departement.create');
    }

    public function store(Request $request)
    {
    	$data=$request->all();
    	// Departement::create($data);
    	return dd($data);
    }
}
