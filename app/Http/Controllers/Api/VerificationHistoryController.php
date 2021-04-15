<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Api\VerificationHistory;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Model;

class VerificationHistoryController extends BaseController
{
    public function index(){
         $verificationHistory = VerificationHistory::all();
        
        if ($verificationHistory == null) 
            return $this->sendError('VerificationHistory Empty', Response::HTTP_NOT_FOUND);

        return $this->sendResponse('List verificationHistory', Response::HTTP_OK, $verificationHistory);
    }

    public function show($id){
       $verificationHistory = VerificationHistory::find($id);

       if($verificationHistory == null)
            return $this->sendError('verificationHistory not found', Response::HTTP_NOT_FOUND);

        return $this->sendResponse('List verificationHistory', Response::HTTP_OK, $verificationHistory);
    }

    public function store(Request $request)
    {
        return VerificationHistory::create($request->all());
    }

    public function update(Request $request, $id){
        $verificationHistory = VerificationHistory::find($id);
        $verificationHistory->update($request->all());
        return $verificationHistory;
    }

    public function destroy($id){
        $verificationHistory = VerificationHistory::find($id);
        $verificationHistory->delete();
        return 204;
    }
}
