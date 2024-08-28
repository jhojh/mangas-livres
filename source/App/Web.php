<?php

namespace Source\App;

use League\Plates\Engine;

class Web
{
    private $view;

public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web","php");
    }

    public function home ()
    {
        //echo "<h1>Eu sou a Home...</h1>";
        echo $this->view->render("home",[]);
    }

    public function cadastro ()
    {
        //echo "<h1>Eu sou a Home...</h1>";
        echo $this->view->render("cadastro",[]);
    }

    public function login ()
    {
        echo $this->view->render("login",[]);
        //echo "<h1>Olá, eu sou o Contato...</h1>";
    }


    public function error (array $data)
    {
        var_dump($data);
    }

}