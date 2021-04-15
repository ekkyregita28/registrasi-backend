<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends BaseController
{

    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'nama' => 'required',
            'password' => 'required'
        ]);
        
        $isFails = $this->isFails($validator);

        if ($isFails == false) { 
            $user = User::where('nama',$request->nama)->first();

            if(!$user || !Hash::check($request->password,$user->password)){
                return $this->sendError('Unauthorised (nama_admin/password error)', Response::HTTP_UNAUTHORIZED);
            }

            return $user;
            
        } else
            return $isFails;
    }
    public function user()
    {
        return $this->sendResponse('Your Personal Account Info', Response::HTTP_OK, Auth::user());
    }

    public function getRandomNumber(){
        $number = mt_rand(100000000, 999999999);

        return $number;
    }
}
