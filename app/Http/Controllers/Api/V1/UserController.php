<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\ControllerInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends BaseController implements ControllerInterface
{
    private UserStoreRequest $custom_store_request;
    private UserUpdateRequest $custom_update_request;

    public function __construct()
    {
        $this->custom_store_request = new UserStoreRequest();
        $this->custom_update_request = new UserUpdateRequest();
    }

    public function index(): JsonResource
    {
        return UserResource::collection(User::paginate(10));
    }

    public function store(Request $request): JsonResource
    {
        $this->_validate($request, $this->custom_store_request);
        $user = User::create($request->all());

        return new UserResource($user);
    }

    public function show(Model $model): JsonResource
    {
        return new UserResource($model);
    }

    public function update(Request $request, Model $model): JsonResource
    {
       $this->_validate($request, $this->custom_update_request);
       $model->update($request->all());

       return new UserResource($model);
    }

    public function destroy(Model $model): JsonResource
    {
       $model->delete();

       return UserResource::collection(User::paginate(10));
    }
}
