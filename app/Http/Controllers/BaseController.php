<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
    /**
     * Function for Send Response to Client
     */
    public function sendResponse($message, $code, $data = null)
    {
        if ($data != null)
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => $message,
            ], $code);
        
        // Send response with no data
        return response()->json([
            'success' => true,
            'message' => $message,
        ], $code);
    }
    
    /**
     * Function for Send Error to Client
     */
    public function sendError($message, $code)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $code);
    }

    /**
     * Function for Check If the Validator is Error
     */
    public function isFails($validator)
    {
        if ($validator->fails()) {
            $erroMsg = $validator->errors();
            return $this->sendError($erroMsg, Response::HTTP_NOT_FOUND);
        }

        return false;
    }
    
}
