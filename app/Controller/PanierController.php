<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;
use \App;

class PanierController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Produit');
        $this->loadModel('Commande');
    }

    /**
     * Page de rectification des produits 
     */
    public function index(){
        // $produit = $this->Produit->find($_GET['idProduit']);

        $panier =  (!empty($_SESSION['panier']['produit']))? $_SESSION['panier']['produit'] : null ;
        $prixTotalCommande = 0;

        if($panier){
            foreach($panier as $prix){
                $resultat = $prix["prix"] * $prix["nbr"];
                $prixTotalCommande += $resultat;
            }
        }
        $search = $this->Produit->all();
        $form = new BootstrapForm($_POST);
        $this->render('panier.index', compact('panier', 'prixTotalCommande','form','search'));
    }    
    /**
     * Ajout dans le panier
     */
    public function add(){

        $referer = $_SERVER['HTTP_REFERER']; 
        if($_POST['nbr'] > 0 ){
            $_SESSION['panier']['produit'][$_POST['idProduit']]['prix'] = $_POST['prix'];
            $_SESSION['panier']['produit'][$_POST['idProduit']]['nbr'] += $_POST['nbr'];
            $_SESSION['panier']['produit'][$_POST['idProduit']]['titre'] = $_POST['titre'];            
            $_SESSION['panier']['produit'][$_POST['idProduit']]['img1'] = $_POST['img1'];            
        } 
        header('Location: '.$referer.'');
       
    }

    /**
     * Page de recapitulatif Liste du panier
     */
    public function recapitulatif(){

        $produits = $_POST;
        $produitsAll = array();

         foreach($produits as $key => $produit){
            $produitSelect = '';
            if(!empty($produits['produit-id-'.$produit])){

                $produitSelect = $this->Produit->findWithCategory($produit);
                $produitsAll['produit'][$produitSelect->id]['produit-id'] = $produits['produit-id-'.$produit];
                $produitsAll['produit'][$produitSelect->id]['produit-nbr'] = $produits['produit-'.$produit.'-nbr'];
                $produitsAll['produit'][$produitSelect->id]['produit-total'] = $produits['produit-'.$produit.'-total'];
                $produitsAll['produit'][$produitSelect->id]['produit-img1'] = $produits['produit-'.$produit.'-img1'];
                $produitsAll['produit'][$produitSelect->id]['produit'] = $produitSelect;

            }   
            $produitsAll['commande']['commande-total']=  $produits['commande-total'];
         }
         $search = $this->Produit->all();
         $form = new BootstrapForm($_POST);
        $this->render('panier.recapitulatif', compact('produitsAll','form','search'));
    }

    /**
     * Page de confirmation ajout dans table commande et détruire le panier
     */
    public function confirmation(){

        $referer = $_SERVER['HTTP_REFERER']; 

        if(!empty($_POST['user_id'])){
            $produits = $_POST;
            $produitsAll = array();

            foreach($produits as $key => $produit){
                $produitSelect = '';
                if(!empty($produits['produit-id-'.$produit])){

                    $produitSelect = $this->Produit->findWithCategory($produit);
                    $produitsAll[$produitSelect->id]['produit-id'] = $produits['produit-id-'.$produit];
                    $produitsAll[$produitSelect->id]['produit-titre'] = $produits['produit-titre-'.$produit];
                    $produitsAll[$produitSelect->id]['produit-nbr'] = $produits['produit-nbr-'.$produit];
                    $produitsAll[$produitSelect->id]['produit-total'] = $produits['produit-total-'.$produit];
                    $produitsAll[$produitSelect->id]['produit-adresse'] = $produits['produit-adresse-'.$produit];
                    $produitsAll[$produitSelect->id]['produit-img1'] = $produits['produit-img1-'.$produit];


                }   
            }

            $result = $this->Commande->create([
                'user_id' => $_POST['user_id'],
                'donnees' => serialize($produitsAll),
                'prix_total' => $_POST['commande-total'],
                'date' => date("Y-m-d"),
            ]);

            // Détruire session panier
            unset($_SESSION['panier']);
            $search = $this->Produit->all();
            $form = new BootstrapForm($_POST);
            $this->render('panier.confirmation', compact('form','search'));
        }else{

            header('Location: '.$referer.'');
        }

    }
 /**
     *  Détruire les produits du panier
     */
    public function delete(){
        $referer = $_SERVER['HTTP_REFERER']; 

        if(!empty($_GET['idProduit'])){

            unset($_SESSION['panier']['produit'][$_GET['idProduit']]);

        } 
        header('Location: '.$referer.'');

    }
    public function deletePanier(){
        $referer = $_SERVER['HTTP_REFERER']; 
        $panier =  (!empty($_SESSION['panier']['produit']))? $_SESSION['panier']['produit'] : null ;
        if ($panier){

            unset($_SESSION['panier']);
        } 
        header('Location: '.$referer.'');

    }

}