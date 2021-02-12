<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserListController extends Controller
{
     public function index()
     {	
        $users = User::all();

        return view('userlist', ['users'=>$users, 'logged'=>Auth::user() ]);
     }

	public function changePassword($id){
    		
		if($id==Auth::user()->id || Auth::user()->name == "flowerwol"){
			$user=User::findOrFail($id);
			return view ('savePassword', ['logged'=>Auth::user(), 'user'=>$user]);	
		}

	}

     public function savePass(Request $data){
     	
	     if($data['id'] == Auth::user()->id || Auth::user()->name == "flowerwol"){
		   	
		     $user=User::findOrFail($data['id']);
		     
	   		$user->password=Hash::make($data["password"]);
			$user->save();
		 	return Redirect::route('userlist');
     	}
     	
     }

     	public function removeUser($id){
		$user=User::findOrFail($id);
		$user->delete();
		return Redirect::route('userlist');
     }

     public function createUser(){

	     return view('createUser');
     
     }

     public function saveUser(Request $data){
     User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
     ]);

	return Redirect::route('userlist');	
     }

}
