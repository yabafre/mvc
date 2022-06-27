<?php
namespace App\Table;

use Core\Table\Table;

class CommandeTable extends Table{

    protected $table = 'commandes';

    /**
     * Récupère les derniers produits
     * @return array
     */
    public function last(){
        return $this->query("
            SELECT commandes.id, commandes.user_id, commandes.date, commandes.prix_total, produits.donnees
            FROM commandes");
    }


    public function lastOder(){
        return $this->query("
            SELECT commandes.id, commandes.user_id, commandes.date, commandes.prix_total, commandes.donnees
            FROM commandes
            ORDER BY commandes.id DESC ");
            
    }


    /**
     * Récupère les dernieres commandes de la category demandée
     * @param $user_id int
     * @return array
     */
    public function lastCommande($user_id){
        return $this->query("
            SELECT commandes.id, commandes.user_id, commandes.date, commandes.prix_total, commandes.donnees
            FROM commandes
            LEFT JOIN users ON commandes.user_id = users.id
            WHERE commandes.user_id = ?
            ORDER BY commandes.id DESC", [$user_id]);
    }

}