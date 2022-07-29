<?php

namespace App;

class Config
{
    public $data;

    /**
     *  connection to database
     */
    public function __construct()
    {
        $this->data = require __DIR__ . '/../config.php';
    }
}
