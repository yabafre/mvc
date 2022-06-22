<?php

namespace Core\Controller;

class Controller{

    protected $viewPath;
    protected $template;

    protected function render($view, $variables = []){
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'template/' . $this->template . '.php');
    }

    protected function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

    protected function notFound(){
       $this->render('posts.erreur');
       die();
    }

    

}

