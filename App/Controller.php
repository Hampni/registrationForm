<?php

namespace App;

abstract class Controller
{
    protected View $view;


    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @return void
     */
    final public function __invoke()
    {
        $this->action();
    }

    abstract protected function action();
}
