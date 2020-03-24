<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
    	$url = "http://newsapi.org/v2/top-headlines?country=us&apiKey=633ad4f5bca64a2e9f47d76b1e28578c";

    	$cURLConnection = curl_init($url);

    	curl_setopt( $cURLConnection, CURLOPT_CUSTOMREQUEST, 'GET' );

    	$newsListResponse = curl_exec($cURLConnection);

    	$newsList = json_decode($newsListResponse, true);
    }

    public function sourceIndex($sourceId){

    	$url = "http://newsapi.org/v2/everything?sources=".$sourceId."&apiKey=633ad4f5bca64a2e9f47d76b1e28578c";
    	// dd($url);

    	$cURLConnection = curl_init($url);

    	curl_setopt( $cURLConnection, CURLOPT_CUSTOMREQUEST, 'GET' );

    	$newsListResponse = curl_exec($cURLConnection);

    	$newsList = json_decode($newsListResponse, true);
    }

    public function countryIndex($countryCode){

    	$url = "http://newsapi.org/v2/top-headlines?country=".$countryCode."&apiKey=633ad4f5bca64a2e9f47d76b1e28578c";

    	$cURLConnection = curl_init($url);

    	curl_setopt( $cURLConnection, CURLOPT_CUSTOMREQUEST, 'GET' );

    	$countryListResponse = curl_exec($cURLConnection);

    	$countryList = json_decode($countryListResponse, true);
    }
}
