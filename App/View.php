<?php

namespace App;

use App\SetGetReadTrait;
use JetBrains\PhpStorm\Internal;


class View
{

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

    /**
     * @param $template
     * @return false|string
     */
    public function render($template)
    {
        ob_start();
        include $template;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }

    use SetGetReadTrait;

}