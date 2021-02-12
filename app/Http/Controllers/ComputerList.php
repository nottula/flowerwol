<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Computer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ComputerList extends Controller
{
	public function index(){

		$user=Auth::user()->name;
		if($user!="flowerwol"){
			return view('home');
		}else{
		$license=DB::table('license')->value('pc');
		$pc=Computer::all();
		if($license>count($pc)){
			$remain=$license-count($pc);
		}else{
			$remain=0;
		}
		return view('computerList', ['pcs'=>$pc, 'remain'=>$remain]);
		}
	}


	public function remove($id){
		$computer=Computer::findOrFail($id);
		$computer->delete();
		return Redirect::route('computer');
	}

	public function inserisciPc(){
		$user=Auth::user()->name;
                if($user!="flowerwol"){
                        return view('home');
                }else{
			return view('inserisciPc');
		}
	}

	public function savePc(Request $pc){
	$user=Auth::user()->name;
                if($user!="flowerwol"){
                        return view('home');
		}else{

			DB::table('computer')->insert([
			'nome'=>$pc['nome'],
			'mac'=>$pc['mac'],
			'indirizzoIp'=>$pc['ip']	
			]);

			return Redirect::route('computer');
		}
			
	}

}
