<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    protected const TABLE = 'users';
    public string $first_name;
    public string $last_name;
    public string $birthday;
    public string $report_subject;
    public string $country;
    public string $phone;
    public string $email;

}