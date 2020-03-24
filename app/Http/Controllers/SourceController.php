<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function index(){
    	$url = "http://newsapi.org/v2/sources?apiKey=633ad4f5bca64a2e9f47d76b1e28578c";

    	$cURLConnection = curl_init($url);

    	curl_setopt( $cURLConnection, CURLOPT_CUSTOMREQUEST, 'GET' );

    	$sourceListResponse = curl_exec($cURLConnection);

    	$sourceList = json_decode($sourceListResponse, true);
    }
}
