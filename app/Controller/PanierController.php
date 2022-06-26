<?php

namespace App\Controller;

use Core\Controller\Controller;
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
        $this->render('panier.index', compact('panier', 'prixTotalCommande'));
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
                $produitsAll['produit'][$produitSelect->id]['produit'] = $produitSelect;

            }   
            $produitsAll['commande']['commande-total']=  $produits['commande-total'];
         }
        $this->render('panier.recapitulatif', compact('produitsAll'));
    }

    /**
     * Page de confirmation ajout dans table commande et détruire le panier
     */
    public function confirmation(){

        $referer = $_SERVER['HTTP_REFERER']; 

        if(!empty($_POST['user_id'])){

            $donnees = serialize($_POST);

            $result = $this->Commande->create([
                'user_id' => $_POST['user_id'],
                'donnees' => $donnees,
                'prix_total' => $_POST['commande-total'],
            ]);

            // Détruire session panier
            unset($_SESSION['panier']);

            $this->render('panier.confirmation');
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