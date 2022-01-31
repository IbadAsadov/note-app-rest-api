<?php


namespace App\Interfaces;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

interface ControllerInterface
{
    public function index() : JsonResource;
    public function store(Request $request) : JsonResource;
    public function show(Model $model) : JsonResource;
    public function update(Request $request,Model $model) : JsonResource;
    public function destroy(Model $model) : JsonResource;
}
