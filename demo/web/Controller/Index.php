<?php
namespace web\Controller;
use core\View;
use Gregwar\Captcha\CaptchaBuilder;
class Index{
    protected $view;

    public function __construct()
    {
        session_start();
        $this->view=new View();
    }

    public function show(){
       return $this->view->make('index')->with('version','1.0');
    }
    public function login(){

        return $this->view->make('login')->with('version','1.0')
            ;
    }
    public function code(){

        $builder = new CaptchaBuilder;
        $builder->build();
        header('Content-type: image/jpeg');
        $_SESSION['phrase'] = $builder->getPhrase();
        $builder->output();
    }

}
