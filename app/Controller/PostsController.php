<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');

    }

    public function index(){
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts.index', compact('posts', 'categories'));
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