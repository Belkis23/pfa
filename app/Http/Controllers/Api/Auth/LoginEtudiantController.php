<?php

namespace App\Http\Controllers\Api\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;
class LoginEtudiantController extends Controller
{
     private $client;
    public function __construct(){
        $this->client = Client::find(2); 

    }



    public function login(Request $request){
    	 $params = [
                'grant_type' => 'password',
                'client_id' => $this->client->id,
                'client_secret' => $this->client->secret,

                'username' => $request->email,
                'password' => $request->password,
                'scope' => '*',
                'provider' => 'api'
            ];
// dd($params);
     $request->request->add($params);

            $proxy = Request::create('http://192.168.64.2/oauth/token' , 'POST');
            
/// return app()->handle($proxy);
            return Route::dispatch($proxy);

    }
}
