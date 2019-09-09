<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;

class AssignmentController extends Controller
{
    public function index()
    {
    	$data = Assignment::orderBy('created_at','DESC')->get();

    	return view('dataassign',compact('data'));
    }

    public function addassign(Request $request){
		


        $user = new Assignment;
        $user->name = $request->name;
        $user->description = $request->description;
       
        $user->save();

        return redirect()->route('assign.index')->with('message','success add assign');

	}
}
