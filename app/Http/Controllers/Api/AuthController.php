<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\Login\SingInRequest;
use App\Http\Requests\Login\SingUpRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    private SingInRequest $custom_sign_in_request;

    public function __construct()
    {
        $this->custom_sign_in_request = new SingInRequest();
    }

    public function signIn(Request $request) : JsonResponse
    {
        $this->_validate($request, $this->custom_sign_in_request);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $authUser = Auth::user();
            $success = [];
            $success['token'] =  $authUser->createToken('MyNoteApp')->plainTextToken;
            $success['user'] =  $authUser;

            return $this->sendResponse($success);
        }
        else{
            return $this->sendError('Unauthorised.', 401);
        }
    }

    public function me() : JsonResource
    {
        return new UserResource(auth()->user());
    }

}
