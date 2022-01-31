<?php

namespace App\Models;

use App\Traits\ModelHandler;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory, SoftDeletes, ModelHandler;

    protected $fillable = [
        "title",
        "text",
        "created_by",
        "updated_by",
        "deleted_by",
    ];


}
