<?php

namespace App\Traits;

use \Illuminate\Http\JsonResponse;

trait ResponseTrait {


    public function returnError($msg ,$statusCode) : JsonResponse
    {
        return response()-> json([
            'status'=>false,
            'msg'=>$msg,
            ], $statusCode ,  ['Content-Type' => 'application/json;charset=UTF-8'],
            JSON_UNESCAPED_UNICODE);
    }

    public function returnSuccess($msg,$statusCode): JsonResponse
    {
      return response()->json([
          'status'=>true,
          'msg'=>$msg,
      ] , $statusCode ,  ['Content-Type' => 'application/json;charset=UTF-8'],JSON_UNESCAPED_UNICODE);
    }

    public function returnData($msg,$value ,$statusCode): jsonResponse
    {
        return response()->json([
            'status'=>true,
            'msg'=>$msg,
            'data'=>$value,
        ],$statusCode,['Content-Type' => 'application/json;charset=UTF-8'],
            JSON_UNESCAPED_UNICODE);
    }




}
