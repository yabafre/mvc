<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;
use \App;

class ProduitsController extends AppController{

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
        $search = $this->Produit->all();
        $form = new BootstrapForm($_POST);
        $this->render('produits.index', compact('produits', 'categories', 'last','form', 'search'));
    }
    

    public function category(){
        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        }
        $produits = $this->Post->lastByCategory($_GET['id']);
        $search = $this->Produit->all();
        $categories = $this->Category->all();
        $this->render('posts.category', compact('produits', 'categories', 'categorie','search'));
    }

    public function addEmail(){

        if (!empty($_POST)) {
            $result = $this->Newsletter->create([
                'email' => $_POST['email'],
            ]);
            if($result){
                return $this->index();
            }
        }
        $form = new BootstrapForm($_POST);
        $search = $this->Produit->all();
        $this->render('produits.index', compact('form', 'produit', 'categories','search'));
    }

    public function show(){
        $categories = $this->Category->all();
        $produit = $this->Produit->find($_GET['id']);
        $search = $this->Produit->all();
        $form = new BootstrapForm($_POST);
        $this->render('produits.show', compact('produit', 'categories','form','search'));
    }

}