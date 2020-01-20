<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\shortlinks;

class linkController extends Controller
{
    /**
     * Display a listing of links as JSON data.
     *
     * @return $shortLinks
     */
    public function index()
    {
        $shortLinks = shortLinks::latest()->get();

        //return view('shortenLink', compact('shortLinks'));
        return $shortLinks->toJson();
    }


    /**
     * Store a newly created link in database.
     * if link isn't correct or not available return error
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         print_r($request->url());
         $isUrlOk=false;
         $li=$request->link;
         $request->validate([               //Validation check if url is correct
            'link' => 'required|url'
         ]);

         $ch = curl_init($li);              //Check is link active
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

                                            //Response
         if($isUrlOk==true){
             $input['link'] = $request->link;
             $input['code'] = Str::random(6);

             shortlinks::create($input);

             return response()->json( "http://".$request->getHttpHost().'/public/link/'.$input['code']);
         }
         else{
             $error['link']="Link isn't active!";
             $response['message']='Greska!';
             $response['errors']=$error;
             return response()->json($response,422);
         }

     }
     public function show(Request $request, $id)
     {

         $shortLinks = shortLinks::where('code',$id)->first();
         return redirect($shortLinks->link);
     }
}
