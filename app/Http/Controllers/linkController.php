<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\shortlinks;

class linkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortLinks = shortLinks::latest()->get();

        //return view('shortenLink', compact('shortLinks'));
        return $shortLinks->toJson();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         $isUrlOk=false;
         $li=$request->link;
         $request->validate([
            'link' => 'required|url'
         ]);
         $ch = curl_init($li);
         curl_setopt($ch, CURLOPT_NOBODY, true);
         curl_exec($ch);
         $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // $retcode > 400 -> not found, $retcode = 200, found.
         if ($retcode == 200) {
                $isUrlOk = true;
         } else {
                $isUrlOk = false;
         }

         curl_close($ch);
         if($isUrlOk==true){
             $input['link'] = $request->link;
             $input['code'] = Str::random(6);

             shortlinks::create($input);

             return response()->json( "http://".$request->getHttpHost().'/'.$input['code']);
         }
         else{
             $error['link']="Link isn't active!";
             $response['message']='Greska!';
             $response['errors']=$error;
             return response()->json($response,422);
         }

     }
}
