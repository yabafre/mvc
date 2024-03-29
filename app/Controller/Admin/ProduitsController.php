<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class ProduitsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
        $this->loadModel('Produit');
        $this->loadModel('Commande');
    }

    public function index(){
        if($_SESSION['user']->role != 'ROLE_ADMIN'){
            header('Location: index.php');
        }
        $this->loadModel('Category');
        $users = $this->User->all();
        $produits = $this->Produit->all();
        $commande = $this->Commande->all();
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $this->render('admin.produits.index', compact('categories', 'form','users', 'produits','commande'));
    }

    public function add(){
        if($_SESSION['user']->role != 'ROLE_ADMIN'){
            header('Location: index.php');
        }

        if (!empty($_POST)) {
            //Enregistrement de l'image
            $image1 = $this->uploadImage('img1');
            $image2 = $this->uploadImage('img2');
            $image3 = $this->uploadImage('img3');

            $result = $this->Produit->create([
                'titre' => $_POST['titre'],
                'prix' => $_POST['prix'],
                'description' => $_POST['description'],
                'category_id' => $_POST['category_id'],
                'img1' => ($image1)? $image1 : null, 
                'img2' => ($image2)? $image2 : null, 
                'img3' => ($image3)? $image3 : null, 
            ]);
            if($result){
                return $this->index();
            }
        }
        $this->loadModel('Category');
        $users = $this->User->all();
        $produits = $this->Produit->all();
        $commande = $this->Commande->all();
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $this->render('admin.produits.edit', compact('categories', 'form','users', 'produits', 'commande'));
    }

    public function edit(){
        if($_SESSION['user']->role != 'ROLE_ADMIN'){
            header('Location: index.php');
        }

        $produit = $this->Produit->find($_GET['id']);

        if (!empty($_POST)) {
            //Enregistrement de l'image
            $image1 = $this->uploadImage('img1');
            $image2 = $this->uploadImage('img2');
            $image3 = $this->uploadImage('img3');
            

            $result = $this->Produit->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'prix' => $_POST['prix'],
                'description' => $_POST['description'],
                'img1' => ($image1)? $image1 : $produit->img1,
                'img2' => ($image2)? $image2 : $produit->img2,
                'img3' => ($image3)? $image3 : $produit->img3,
                'prix' => $_POST['prix'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                return $this->index();
                
            }
        }
        
        $this->loadModel('Category');
        $users = $this->User->all();
        $produits = $this->Produit->all();
        $commande = $this->Commande->all();
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($produit);
        $this->render('admin.produits.edit', compact('categories', 'form','users', 'produits', 'commande'));
    }

    public function delete(){
        if($_SESSION['user']->role != 'ROLE_ADMIN'){
            header('Location: index.php');
        }

        if (!empty($_POST)) {
            $result = $this->Produit->delete($_POST['id']);
            return $this->index();
        }
    }

    /*
    * Fonction d'enregistrement d'image 
    */
    public function uploadImage($img){
        //Vérifier si le formulaire a été soumis
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Vérifie si le fichier a été uploadé sans erreur.
            if(isset($_FILES[$img]) && $_FILES[$img]["error"] == 0){

                $allowed = array("jpg" => "image/jpg" , "webp" => "image/webp", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES[$img]["name"];
                $filetype = $_FILES[$img]["type"];
                $filesize = $_FILES[$img]["size"];
                
                // Vérifie l'extension du fichier
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                // Vérifie la taille du fichier - 2Mo maximum
                $maxsize = 2 * 1024 * 1024;
                if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée 2Mo.");

                // Vérifie le type MIME du fichier
                if(in_array($filetype, $allowed)){
                    move_uploaded_file($_FILES[$img]["tmp_name"], "../public/asset/produits" . $_FILES[$img]["name"]);
                    echo "Votre fichier a été téléchargé avec succès.";
                    return $filename;
                } else{
                    echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
                    return false;
                }
            } else{
               echo "Error: ";
                return false;
            }
        }
    }

}