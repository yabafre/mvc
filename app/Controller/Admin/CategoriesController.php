<?php

namespace App\Controller\Admin;


use Core\HTML\BootstrapForm;

class CategoriesController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
        $this->loadModel('Produit');
        $this->loadModel('Category');
    }

    public function index(){
        $users = $this->User->all();
        $produits = $this->Produit->all();
        $items = $this->Category->all();
        $this->render('admin.categories.index', compact('items','users','produits'));
    }

    public function add(){
        if (!empty($_POST)) {
            
            $image = $this->uploadImage();
            var_dump($image);
            $result = $this->Category->create([
                'titre' => $_POST['titre'],
                'img' => ($image)? $image : null,
            ]);
            return $this->index();
        }
        $users = $this->User->all();
        $produits = $this->Produit->all();
        $form = new BootstrapForm($_POST);
        $this->render('admin.categories.edit', compact('form','users','produits'));
    }

    public function edit(){

        $category = $this->Category->find($_GET['id']);
        if (!empty($_POST)) {
            
            $image = $this->uploadImage();
            $result = $this->Category->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'img' => ($image)? $image : $category->img,
            ]);
            return $this->index();
        }
        $users = $this->User->all();
        $produits = $this->Produit->all();
        $form = new BootstrapForm($category);
        $this->render('admin.categories.edit', compact('form','users','produits'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);
            return $this->index();
        }
    }

    /*
    * Fonction d'enregistrement d'image 
    */
    public function uploadImage(){
        //Vérifier si le formulaire a été soumis
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Vérifie si le fichier a été uploadé sans erreur.
            if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){

                $allowed = array("jpg" => "image/jpg", "webp" => "image/webp", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["img"]["name"];
                $filetype = $_FILES["img"]["type"];
                $filesize = $_FILES["img"]["size"];
                
                // Vérifie l'extension du fichier
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                // Vérifie la taille du fichier - 2Mo maximum
                $maxsize = 2 * 1024 * 1024;
                if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée 2Mo.");

                // Vérifie le type MIME du fichier
                if(in_array($filetype, $allowed)){
                    move_uploaded_file($_FILES["img"]["tmp_name"], "../public/asset/produits" . $_FILES["img"]["name"]);
                    //echo "Votre fichier a été téléchargé avec succès.";
                    return $filename;
                } else{
                    echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
                    return false;
                }
            } else{
                //echo "Error: " . $_FILES["img"]["error"];
                return false;
            }
        }
    }

}