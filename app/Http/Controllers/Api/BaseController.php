<?php


namespace App\Http\Controllers\Api;


use App\Exceptions\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{

    public function sendResponse($data) : JsonResponse
    {
        $response = [
           "data" => $data,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, int $code) : JsonResponse
    {
        $response = [
            'error' => $error,
        ];

        return response()->json($response, $code);
    }

    public function _validate(Request $request, $controller_specific_request) : Request
    {
        $validator = Validator::make($request->all(), $controller_specific_request->rules());


        if ($validator->fails()){
            throw new ValidationException(json_decode($validator->errors(), true));
        }

        return $request;
    }
}
