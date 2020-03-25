<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LikeNews;
use DB;

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

    public function likeDislikeNews(Request $request){
        $validatedData = $request->validate([
            'flag' => 'required|boolean',
            'sourceName' => 'required',
            'title' => 'required'
        ]);

        $data = [
            'flag' => $request->flag,
            'sourceName' => str_replace("'", '', $request->sourceName),
            'title' => str_replace("'", '', $request->title),

        ];
        LikeNews::create($data);

        return response()->json([
            'status' => 'ok',
            'message' => "Successfully posted your view.",
            'data' => $this->getViweData($request->title,$request->sourceName),
            'error' => 0,
        ]);

    }

    public function getUsersViews(Request $request){
        $validatedData = $request->validate([
            'sourceName' => 'required',
            'title' => 'required'
        ]);



        $data = $this->getViweData($request->title,$request->sourceName);

        return response()->json([
            'status' => 'ok',
            'data' => $data,
            'error' => 0,
        ]);

    }

    public function getViweData($titleParam,$sourceNameParam){
        $initializeCount = [
            [
                'count_flag' => 0,
                'flag' => 0,
            ],
            [
                'count_flag' => 0,
                'flag' => 1,
            ]
        ];
        $title = str_replace("'", '', $titleParam);
        $count = LikeNews::select(DB::raw('COUNT(1) AS count_flag, flag'))->groupBy('flag')->WHERE('title',$title)->WHERE('sourceName',$sourceNameParam)->get()->toArray();

        return array_replace_recursive($initializeCount,$count);
    }
}
