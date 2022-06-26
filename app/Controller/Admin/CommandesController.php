<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class CommandesController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
        $this->loadModel('Commande');
        $this->loadModel('Produit');
    }

    public function index(){
        if($_SESSION['user']->role != 'ROLE_ADMIN'){
            header('Location: index.php');
        }
        $commande = $this->Commande->all();
        $produits = $this->Produit->all();
        $users = $this->User->all();

        $this->render('admin.commandes.index', compact('produits', 'commande', 'users'));
    }

    public function add(){
        if($_SESSION['user']->role != 'ROLE_ADMIN'){
            header('Location: index.php');
        }

        if (!empty($_POST)) {
            //Enregistrement de l'image

            $result = $this->Produit->create([
                'donnees' => $_POST['donnees'],
                'date' => date('Ymd'),
            ]);
            if($result){
                return $this->index();
            }
        }

        $this->loadModel('Category');

        $categories = $this->Category->extract('id', 'titre');
        $users = $this->User->all();
        $produits = $this->Produit->all();
        $commande = $this->Commande->all();
        $form = new BootstrapForm($_POST);
        $this->render('admin.commandes.edit', compact('categories', 'form', 'users','produits', 'commande'));
    }

    public function delete(){
        if($_SESSION['user']->role != 'ROLE_ADMIN'){
            header('Location: index.php');
        }

        if (!empty($_POST)) {
            $result = $this->Commande->delete($_POST['id']);
            return $this->index();
        }
    }



}