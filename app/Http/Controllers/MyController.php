<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Session;


class MyController extends Controller
{
    public function __construct()
    {
        
        $base_url='http://'.$_SERVER['HTTP_HOST'].'/uploads/';
        
        $this->data['base_uploads_url']=$base_url;
        
        return (!empty($login_user)) ? true : false;
    }
    public function encrypt($data){
    	for($i = 0, $key = 27, $c = 48; $i <= 255; $i++){
    		$c = 255 & ($key ^ ($c << 1));
    		$table[$key] = $c;
    		$key = 255 & ($key + 1);
    	}
    	$len = strlen($data);
    	for($i = 0; $i < $len; $i++){
    		$data[$i] = chr($table[ord($data[$i])]);
    	}
    	return base64_encode($data);
    }
    public function decrypt($data){
		$data = base64_decode($data);
		for($i = 0, $key = 27, $c = 48; $i <= 255; $i++){
			$c = 255 & ($key ^ ($c << 1));
			$table[$c] = $key;
			$key = 255 & ($key + 1);
		}
		$len = strlen($data);
		for($i = 0; $i < $len; $i++){
			$data[$i] = chr($table[ord($data[$i])]);
		}		
		return $data;
	}
}
