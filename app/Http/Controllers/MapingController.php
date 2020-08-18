<?php

namespace App\Http\Controllers;

use App\AdminModel;
use Illuminate\Http\Request;

class MapingController extends Controller
{
    public function index()
    {
		/*
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "api.localhost/artikel",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		curl_close($curl);
		
		$result = json_decode($response, true);
		return view('view_maping.index', compact('result'));
		*/

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.kawalcorona.com/indonesia/",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		curl_close($curl);
		
		$result = json_decode($response, true);
		return view('view_maping.index', compact('result'));
	}
	
    public function show($id)
    {
        $curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "api.localhost/artikel/".$id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		curl_close($curl);
		
        $result = json_decode($response, true);
        return view('view_maping.detail', compact('result'));
    }
}
