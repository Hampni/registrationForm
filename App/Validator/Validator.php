<?php

namespace App\Validator;

use App\Models\User;

class Validator
{
    protected array $errors = [];

    public function validate($requestData): void
    {
        foreach ($requestData as $key => $field) {
            if (method_exists(self::class, 'validate' . ucfirst($key))) {
                $validationMethod = 'validate' . ucfirst($key);
                $this->$validationMethod($key, $field);
            }
        }
    }

    public function validateFirst_name($key, $field)
    {
        if ($field == '') {
            $this->errors[$key] = 'You did not fill this field';
        } elseif (preg_match('~[\\\/:*?"\'<>|\r\n]~', $field)) {
            $this->errors[$key] = 'Used invalid symbols';
        }
    }

    public function validateLast_name($key, $field)
    {
        if ($field == '') {
            $this->errors[$key] = 'You did not fill this field';
        } elseif (preg_match('~[\\\/:*?"\'<>|\r\n]~', $field)) {
            $this->errors[$key] = 'Used invalid symbols';
        }
    }

    public function validateBirthday($key, $field)
    {
        if ($field == '') {
            $this->errors[$key] = 'You did not fill this field';
        } elseif (strpos($field, '_') !== false) {
            $this->errors[$key] = 'Data is not filled';
        }
    }

    public function validateReport_subject($key, $field)
    {
        if ($field == '') {
            $this->errors[$key] = 'You did not fill this field';
        } elseif (preg_match('~[\\\/:*?"\'<>|\r\n]~', $field)) {
            $this->errors[$key] = 'Used invalid symbols';
        }
    }

    public function validateCountry($key, $field)
    {
        if ($field == '') {
            $this->errors[$key] = 'Choose your country';
        }
    }

    public function validatePhone($key, $field)
    {
        if ($field == '') {
            $this->errors[$key] = 'Insert your phone number';
        }
    }

    public function validateEmail($key, $field)
    {
        $user = new User();
        $email = $user->findByEmail($field);

        if ($field == '') {
            $this->errors[$key] = 'You did not insert email';
        } elseif (strpos($field, '@') == false) {
            $this->errors[$key] = 'You did not insert email';
        } elseif ($email !== 'not found') {
            $this->errors[$key] = 'Such email already exists!';
        } elseif (preg_match('~[\\\/:*?"\'<>|\r\n]~', $field)) {
            $this->errors[$key] = 'Used invalid symbols';
        }
    }

    public function validateCompany($key, $field)
    {
        if (preg_match('~[\\\/:*?"\'<>|\r\n]~', $field)) {
            $this->errors[$key] = 'Used invalid symbols. Only upper, lower case and digits';
        }
    }

    public function validatePosition($key, $field)
    {
        if (preg_match('~[\\\/:*?"\'<>|\r\n]~', $field)) {
            $this->errors[$key] = 'Used invalid symbols. Only upper, lower case and digits';
        }
    }

    public function validateAbout_me($key, $field)
    {
        if (preg_match('~[\\\/:*?"\'<>|]~', $field)) {
            $this->errors[$key] = 'Used invalid symbols. Only upper, lower case and digits';
        } elseif (preg_match('~[\r\n]~', $field)) {
            $this->errors[$key] = 'No line breaks';
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
