<?php

namespace App;

use App\SetGetReadTrait;
use JetBrains\PhpStorm\Internal;

class View
{
    use SetGetReadTrait;

    private $data = [];

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function add($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * @param $template
     * @return void
     */
    public function display($template)
    {
        include $template;
    }
}
