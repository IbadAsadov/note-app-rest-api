<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Note\NoteStoreRequest;
use App\Http\Resources\NoteResource;
use App\Interfaces\ControllerInterface;
use App\Models\Note;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteController extends BaseController implements ControllerInterface
{

    private NoteStoreRequest $custom_request;

    public function __construct()
    {
        $this->custom_request = new NoteStoreRequest();
    }

    public function index() : JsonResource
    {
        return NoteResource::collection(Note::paginate(10));
    }

    public function store(Request $request): JsonResource
    {
        $this->_validate($request, $this->custom_request);
        $note = Note::create($request->all());

        return new NoteResource($note);
    }

    public function show(Model $model): JsonResource
    {
        return new NoteResource($model);
    }

    public function update(Request $request,Model $model): JsonResource
    {
       $this->_validate($request, $this->custom_request);
       $model->update($request->all());

        return new NoteResource($model);
    }

    public function destroy(Model $model): JsonResource
    {
        $model->delete();

        return NoteResource::collection(Note::paginate(10));
    }
}
