<?php

namespace App\Validator;

use App\Exeptions\ValidationExeption;

class Validator
{

    protected array $errors = [];

    public function validate($requestData): void
    {
        foreach ($requestData as $key => $field) {
            if (empty($field)) {
                $this->errors[] = $key;
            }
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}