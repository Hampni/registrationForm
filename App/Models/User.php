<?php

namespace App\Models;

use App\Db;
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

    public static function countUsers()
    {
        $db = new Db();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE;
        $data = $db->query($sql);
        return $data[0]->count;
    }
}
