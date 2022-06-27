<?php

namespace App\Controller\Admin;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
        $this->loadModel('Produit');
        $this->loadModel('Commande');
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index(){
        $users = $this->User->all();
        $posts = $this->Post->all();
        $commande = $this->Commande->all();
        $produits = $this->Produit->all();
        $categories = $this->Category->all();
        $this->render('admin.posts.index', compact('posts','users','produits', 'commande','categories'));
    }


}