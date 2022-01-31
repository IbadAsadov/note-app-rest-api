<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ValidationException extends Exception
{
    private $errors;

    public function __construct(array $messages, $code = 0, Throwable $previous = null)
    {
        $this->errors = $messages;
        parent::__construct("Validation error", $code, $previous);
    }

    public function render()
    {
//        $errors = json_decode($this->getMessage(), true);

        return response()->json(['error' => [
            'message' => $this->errors,
            'code' => 400
        ]], 400);
    }
}
