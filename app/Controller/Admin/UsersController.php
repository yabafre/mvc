<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class UsersController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
        $this->loadModel('Produit');
    }

    public function index(){
        $users = $this->User->all();
        $produits = $this->Produit->all();
        $form = new BootstrapForm($_POST);
        $this->render('admin.users.index', compact('users', 'form','produits'));
    }

    public function add(){
        $users = $this->User->all();
        if (!empty($_POST)) {

            $result = $this->User->create([
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'tel' => $_POST['tel'],
                'password' => $_POST['password'],
                'role' => "ROLE_USER"
            ]);
            if($result){
                return $this->index();
            }
        }
        $form = new BootstrapForm($_POST);
        $produits = $this->Produit->all();
        $this->render('admin.users.add', compact('users', 'form','produits'));
    }

    public function edit(){
        $users = $this->User->find($_GET['id']);
        $users = $this->User->all();

        if (!empty($_POST)) {
            $result = $this->User->update($_GET['id'], [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'tel' => $_POST['tel'],
                'password' => $_POST['password'],
                'role' => $_POST['role']
            ]);
                
            if($result){
                return $this->index();
            }
        }
        $form = new BootstrapForm($users);
        $produits = $this->Produit->all();
        $this->render('admin.users.edit', compact('users', 'form','produits'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->User->delete($_POST['id']);
            return $this->index();
        }
    }

    public function inscription(){
        $errors = false;
        $messageError = null;

        if(!empty($_POST)){
            // Vérification des champs de manière générale
            if(empty($_POST['firstname']) || 
               empty($_POST['lastname']) || 
               empty($_POST['email']) ||
               empty($_POST['tel']) ||
               empty($_POST['password'])
               ){
                $errors = true;
                $messageError = "Veuillez remplir tous les champs";
            }else{

                if(strlen($_POST['tel']) < 10){
                    $errors = true;
                    $messageError = "Le champ de téléphone doit comporter 10 chiffres";
                }

                if(!$errors){
                    $this->registration($_POST);
                }   
            }
        }
        $form = new BootstrapForm($_POST);
        $produits = $this->Produit->all();
        $this->render('users.inscription ', compact('form', 'errors', 'messageError', 'users','produits',));
    }

    public function registration($donnees){
        if (!empty($donnees)) {
            $result = $this->User->create([
                'email' => $_POST['email'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'tel' => $_POST['tel'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'role' => 'ROLE_USER',
            ]);
            if($result){
                header('Location: index.php?p=users.login');
            }
        }
    }
}