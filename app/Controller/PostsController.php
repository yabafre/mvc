<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Produit');
        $this->loadModel('Category');
        $this->loadModel('Newsletter');

    }

    public function index(){
        $produits = "";
       if (isset($_GET["categorie"])){
        $categorie = $this->Category->find($_GET['categorie']);
        if($categorie === false){
            $this->notFound();
        }
            $produits = $this->Produit->lastByCategory($_GET["categorie"]);
            
       } 
        $categories = $this->Category->all();
        $last = $this->Produit->last();
        $form = new BootstrapForm($_POST);
        $this->render('produits.index', compact('produits', 'categories', 'last','form'));
    }

    public function erreur(){
        $this->render('posts.erreur');
    }

    public function category(){
        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        } else{
            $articles = $this->Post->lastByCategory($_GET['id']);
            $categories = $this->Category->all();
            $this->render('posts.category', compact('articles', 'categories', 'categorie'));
        }
        
    }

    public function show(){

        $article = $this->Post->findWithCategory($_GET['id']);
        App::getInstance()->title = $article->titre;

        $this->render('posts.show', compact('article'));
    }

}