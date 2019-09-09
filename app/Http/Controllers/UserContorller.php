<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Assignment;

class UserContorller extends Controller
{
	public function index(){
	 $roles = Role::orderBy('created_at','DESC')->get();	
     $data = User::orderBy('created_at','DESC')->get();
     $assign = Assignment::orderBy('created_at','DESC')->get();

     

     return view('DataUser',compact('data','roles','assign'));
		
	}

	protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:1', 'confirmed'],
            
        ]);
    }

	public function adduser(Request $request){
		$this->validator($request->all())->validate();

		$random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890');
        $password = substr($random, 0, 5);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->random_pass = $password;
        $user->role_id = $request->role;
        $user->save();

        return redirect()->route('user.index')->with('message','success add user');

	}

	public function edit($id){
		$user = User::where('id',$id)->first();
		// dd($users);
        $roles = Role::Orderby('id','desc')->get();

        return view('edituser',compact('user','roles'));
	}

	public function update(Request $request){
		$update = User::where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role
            ]);
        
        
        return redirect()->route('user.index')->with('message','success edit user');
	}

	public function destroy($id)
	{
    	$del = User::find($id);
    	$del->delete();
 
    	return redirect()->route('user.index')->with('message','success delete user');
	}

	public function assign($id){
		$assign = Assignment::orderBy('created_at','DESC')->get();
		$user = User::where('id',$id)->first();
		
        $roles = Role::Orderby('id','desc')->get();
     

     return view('assignuser',compact('user','roles','assign'));

	}

	public function assignadd(Request $request){
		$update = User::where('id',$request->id)->update([
		            'name' => $request->name,
		            ]);
		


		

		return redirect()->route('user.index')->with('message','success assign user');
	}

}
