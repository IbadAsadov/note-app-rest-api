<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class RoleResource extends JsonResource
{
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'permission' => $this->permission,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
