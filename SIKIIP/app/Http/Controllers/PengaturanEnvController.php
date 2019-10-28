<?php

namespace App\Http\Controllers;

use File;
use Storage;
use Illuminate\Http\Request;

class PengaturanEnvController extends Controller
{
	public function index (){
		$pengaturan_env = \App\PengaturanEnv::find(1);
		return view('Pengaturan.pengaturan_env', ['pengaturan_env' => $pengaturan_env]);
	}

	public function update (Request $request){

		$path = base_path('.env');
		$file = File::get($path);

		foreach (explode("\n", $file) as $key=>$line){
			$array = preg_split('/=/', $line);

			if(count($array) > 1){
				if($array[0] == 'DB_CONNECTION_SECOND'){
					$data[] = 'DB_CONNECTION_SECOND='.$request->DB_CONNECTION."\n";
				} else if($array[0] == 'DB_HOST_SECOND'){
					$data[] = 'DB_HOST_SECOND='.$request->DB_HOST."\n";
				} else if($array[0] == 'DB_PORT_SECOND'){
					$data[] = 'DB_PORT_SECOND='.$request->DB_PORT."\n";
				} else if($array[0] == 'DB_DATABASE_SECOND'){
					$data[] = 'DB_DATABASE_SECOND='.$request->DB_DATABASE."\n";
				} else if($array[0] == 'DB_USERNAME_SECOND'){
					$data[] = 'DB_USERNAME_SECOND='.$request->DB_USERNAME."\n";
				} else if($array[0] == 'DB_PASSWORD_SECOND'){
					$data[] = 'DB_PASSWORD_SECOND='.$request->DB_PASSWORD."\n";
				} else {
					$data[] = $line."\n";
				}
			} else {
			$data[] = "\n";	
			}
		}

		file_put_contents(base_path('.env'),$data);

		$notification = array(
			'message' => 'Data Berhasil Diupdate',
			'alert-type' => 'success'
		);

		return back( ) ->with($notification);
	}
}
