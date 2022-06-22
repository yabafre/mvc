<?php

namespace App\Controller\Admin;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
        $this->loadModel('Produit');
        $this->loadModel('Post');
    }

    public function index(){
        $users = $this->User->all();
        $posts = $this->Post->all();
        $produits = $this->Produit->all();
        $this->render('admin.posts.index', compact('posts','users','produits'));
    }

    public function add(){
        if (!empty($_POST)) {
            $result = $this->Post->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                return $this->index();
            }
        }
        $this->loadModel('Category');
        $users = $this->User->all();
        $produits = $this->Produit->all();
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.edit', compact('categories', 'form','users','produits'));
    }

    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Post->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                return $this->index();
            }
        }
        $post = $this->Post->find($_GET['id']);
        $this->loadModel('Category');
        $users = $this->User->all();
        $produits = $this->Produit->all();
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form','users','produits'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            return $this->index();
        }
    }

}