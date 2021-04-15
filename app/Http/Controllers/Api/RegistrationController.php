<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Api\Registration;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Model;

class RegistrationController extends BaseController
{
    public function index(){
         $registration = Registration::all();
        
        if ($registration == null) 
            return $this->sendError('registration Empty', Response::HTTP_NOT_FOUND);

        return $this->sendResponse('List registration', Response::HTTP_OK, $registration);
    }

    public function show($id){
       $registration = Registration::find($id);

       if($registration == null)
            return $this->sendError('registration not found', Response::HTTP_NOT_FOUND);

        return $this->sendResponse('List registration', Response::HTTP_OK, $registration);
    }

    public function store(Request $request)
    {
        return Registration::create($request->all());
    }

    public function update(Request $request, $id){
        $registration = Registration::find($id);
        $registration->update($request->all());
        return $registration;
    }

    public function destroy($id){
        $registration = Registration::find($id);
        $registration->delete();
        return 204;
    }

    public function getAllVerifHistory($id){
        $allVerifHistory = Registration::find($id)->verifHistory;
        if($allVerifHistory == null)
            return $this->sendError('history not found', Response::HTTP_NOT_FOUND);

        return $this->sendResponse('List History', Response::HTTP_OK, $allVerifHistory);
    }
}
