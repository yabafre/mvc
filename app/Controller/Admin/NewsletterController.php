<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;
use \App;

class NewsletterController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Newsletter');

    }

    public function index(){
        $form = new BootstrapForm($_POST);
        $this->render('produits.index', compact('form'));
    }

    

}