<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Diegonz\PHPWakeOnLan\Facades\PHPWakeOnLan;

class verificaTelefonica extends Controller
{
	public function checkNumero($number){

		$indirizzoClient= $_SERVER['REMOTE_ADDR'];

		if ($indirizzoClient!='127.0.0.1' && $indirizzoClient!='localhost'){
		return $indirizzoClient;
		}else{
			$presente=DB::table('numeriTelefonici')->where('numero', $number)->count();
			if($presente>0){
			return 'ok';
			}else{
			return 'ko';
			}
		}
		
	}

	public function checkPc($id){
		
		$license=DB::table('license')->value('pc');

		$count=DB::table('computer')->count();

		$mac=DB::table('computer')->where('id', $id)->value('mac');

		$maxpc=$count-$license;

		if ($maxpc > $id || $maxpc == $id){
			return $id;
		}

		$pc=[$mac];

		PHPWakeOnLan::wake($pc);

		return $mac;	
	}
	
	public function checkPcWeb($id){

                $license=DB::table('license')->value('pc');

                $count=DB::table('computer')->count();

                $mac=DB::table('computer')->where('id', $id)->value('mac');

                $maxpc=$count-$license;

                if ($maxpc > $id || $maxpc == $id){
                        return redirect('/home');
                }

                $pc=[$mac];

                PHPWakeOnLan::wake($pc);

                return redirect('/home');
        }
}
