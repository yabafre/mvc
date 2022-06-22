<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class ProduitsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Produit');
        $this->loadModel('Category');

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
        
        $this->render('produits.index', compact('produits', 'categories'));
    }
    

    public function category(){
        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        }
        $produits = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('produits', 'categories', 'categorie'));
    }

    public function show(){

        $produit = $this->Produit->findWithCategory($_GET['id']);
        App::getInstance()->title = $produit->titre;

        $this->render('produits.show', compact('produit'));
    }

}