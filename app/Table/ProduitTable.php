<?php
namespace App\Table;

use Core\Table\Table;

class ProduitTable extends Table{

    protected $table = 'produits';

    /**
     * Récupère les derniers produits
     * @return array
     */
    public function last(){
        return $this->query("
            SELECT produits.id, produits.titre, produits.img1, produits.img2, produits.img3,  produits.description, produits.prix, categories.titre as categorie, sous_categories.titre as souscategorie
            FROM produits
            LEFT JOIN categories ON category_id = categories.id
            LEFT JOIN sous_categories ON sous_category_id = sous_categories.id
            ORDER BY produits.id DESC LIMIT 6");
            
    }

    /**
     * Récupère les derniers produits de la category demandée
     * @param $category_id int
     * @return array
     */
    public function lastByCategory($category_id){
        return $this->query("
            SELECT produits.id, produits.titre, produits.description, produits.img1, produits.img2, produits.img3, produits.prix, categories.titre as categorie
            FROM produits
            LEFT JOIN categories ON category_id = categories.id
            LEFT JOIN sous_categories ON sous_category_id = sous_categories.id
            WHERE produits.category_id = ?
            ORDER BY produits.id DESC", [$category_id]);
    }

    /**
     * Récupère un produit en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\ProduitEntity
     */
    public function findWithCategory($id){
        return $this->query("
            SELECT produits.id, produits.titre, produits.description, produits.img1, produits.img2, produits.img3
            FROM produits
            WHERE produits.id = ?", [$id], true);
    }
}