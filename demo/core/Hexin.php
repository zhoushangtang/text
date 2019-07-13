<?php
namespace core;
class Hexin{
    public static function run(){

      self::parseUrl();
    }
    //分析URL
    public static function parseUrl(){
            if(isset($_GET['s'])){
                $info=explode('/',$_GET['s']);
                $class='\web\Controller\\'.ucfirst($info[0]);
                $action=$info[1];

            }else{
                $class='\web\Controller\Index';
                $action='show';
            }
      echo  (new $class)->$action();
    }
}