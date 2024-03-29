<?php
namespace Controller;
use \Smarty;

class ViewController
{
    static array $vars = [];
    static object $tplMotor;
    static string $motor;

    static public function Init(string $motor=null) : void
    {
        if(!is_null($motor))
            self::$motor = $motor;
        
        switch(self::$motor) 
        {
            case 'smarty':
                self::$tplMotor  = new \Smarty();
                // Empecher balises html
                self::$tplMotor->escape_html=true;
                self::$tplMotor->setTemplateDir(DIR_VIEW.'smarty/');
                self::$tplMotor->setCompileDir(DIR_PRIVATE.'templates_c/');
                self::$tplMotor->setCacheDir(DIR_PRIVATE.'cache_c/');
                break;
            case 'php':
                break;
            case 'twig':
                self::$tplMotor = new \Twig\Loader\FilesystemLoader(DIR_VIEW.'twig/');
                break;
        }
    }

    // View::Set('h1','Hello world !!!');
    static public function Set(string $var,$value):void
    {

        switch(self::$motor)
        {
            case 'smarty':
                self::$tplMotor->assign($var,$value);
                break;
            case 'php':
                self::$vars[$var] = $value;
                break;
            case 'twig':
                self::$vars[$var] = $value;
                break;
        }
       
    }

    static public function Get(string $var)
    {
        switch(self::$motor)
        {
            case 'smarty':
                break;
            case 'php':
                return self::$vars[$var];
                break;
            case 'twig':
                break;
        }
       
    }

    static public function Display(string $view):void
    {
        switch(self::$motor)
        {
            case 'smarty':
                self::$tplMotor->display($view.'.tpl');
                break;
            case 'php':
                require_once(DIR_VIEW . $view . '.php');
                break;
            case 'twig':
                $twig = new \Twig\Environment(self::$tplMotor);
                echo $twig->render($view.'.twig',self::$vars);
                break;
        }
    }
}

?>