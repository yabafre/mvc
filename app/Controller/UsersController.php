<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

class UsersController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
        $this->loadModel('Produit');
        $this->loadModel('Commande');
    }

    public function login(){
        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['email'], $_POST['password'])){
                if($_SESSION['user']->role === 'ROLE_ADMIN'){
                    // champ user 'role' administrateur
                    header('Location: index.php?p=admin.posts.index');
                    // champ user 'user'
                }else{
                    header('Location: index.php');
                }
            } else {
                $errors = true;
            }
        }
        $search = $this->Produit->all();
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors','search'));
    }

    /*
    * fonction de déconnexion de l'utilisateur
    */
    public function logout(){
  
        $this->render('users.logout');
    }



     /*
    * fonction d'accès compte utilisateur
    */

    public function account(){
       
        $users = $this->User->find($_SESSION['auth']);
        $commandes = $this->Commande->lastCommande($_SESSION['auth']);
        $produits = $this->Produit->all();
        $search = $this->Produit->all();
        $form = new BootstrapForm($users);
        $this->render('users.account', compact('form','users','produits', 'commandes','search'));        
    }

    /*
    * fonction de modifier un utilisateur depuis Compte
    */

    public function modification(){
        $errors = array();
        $success = true;

        if(empty($_POST['firstname'])){
            $errors["firstnameError"] = "Veuillez saisir votre prénom.";
            $success = false;
        }

        if(empty($_POST['lastname'])){
            $errors["lastnameError"] = "Veuillez saisir votre nom.";
            $success = false;
        }

        if(!empty($_POST["tel"]) && (!filter_var( $_POST["tel"]) || strlen($_POST["tel"]) != 10)){
            $errors["telError"] = "Veuillez saisir un numéro valide.";
            $success = false;
        }

        if(empty($_POST["email"])){
            $errors["emailError"] = "Veuillez saisir votre e-mail.";
            $success = false;
        } else if(!empty($_POST["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $errors["emailError"] = "Veuillez saisir un email valide.";
            $success = false;
        }

        if($success){
            $this->editCompte($_POST);
        }else{
            echo '<p class="font40 coloro">no</p>';
        }
        $users = $this->User->find($_SESSION['auth']);
        $search = $this->Produit->all();
        $form = new BootstrapForm($_POST);
        $this->render('users.account', compact( 'form', 'errors', 'success', 'users','search'));
    }

    /*
    * fonction d'enregistrement des modifs de l'utilisateur
    */

    public function editCompte($donnees){
        if (!empty($donnees)) {
            $result = $this->User->update($_SESSION['auth'], [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'tel' => $_POST['tel'],
                'email' => $_POST['email'],
            ]);
            if($result){
                header('Location: index.php?p=users.account');
            }

        }
    }
    /*
    * fonction d'inscription de l'utilisateur
    */
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
        $search = $this->Produit->all();
        $form = new BootstrapForm($_POST);
        $this->render('users.inscription ', compact('form', 'errors', 'messageError','search'));
    }

    /*
    * fonction d'enregistrement de l'utilisateur
    */
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