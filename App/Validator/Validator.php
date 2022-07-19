<?php

namespace App\Validator;

use App\Exeptions\ValidationExeption;

class Validator
{

    public static function validate($requestData)
    {

        if (
            empty($requestData) ||
            empty($requestData['First_name']) ||
            empty($requestData['Last_name']) ||
            empty($requestData['Birthday']) ||
            empty($requestData['Report_subject']) ||
            empty($requestData['Country']) ||
            empty($requestData['Phone']) ||
            empty($requestData['Email'])
        ) {
            throw new ValidationExeption();
        } else {
            return true;
        }

    }
}