<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse{

    /**
     * Success response
     * @param string|array $data
     * @param int $code
     * @return \Illuminate\Http\JSONResponse
    */
    public function successResponse($data, $code = Response::HTTP_OK){
        return response()->json($data, $code);
    }


    /**
     * Error response
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JSONResponse
    */

    public function errorResponse($message, $code = Response::HTTP_INTERNAL_SERVER_ERROR){ 
        return response()->json([ "error"=> $message, "code" => $code], $code);
    }
}