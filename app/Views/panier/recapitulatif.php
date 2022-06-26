
<div class="dash produits">
            <div class="recentOrders">
                <div class="cardHeader">
<h1>Récapitulatif de la commande</h1>

<table class="table">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Titre</td>
                        <td>Image1</td>
                        <td>Quantité</td>
                        <td>Prix Total</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody></tbody>
                        <?php
                        foreach($produitsAll['produit'] as $produit){ ?>
                        <tr>
                            <td><?=$produit['produit']->id ?></td>
                            <td><?=$produit['produit']->titre ?></td>
                            <td><img src="../public/asset/produits/<?= $produit['produit']->img1; ?>" style="width:40%"></td>
                            <td><?=$produit['produit-nbr'] ?></td>
                            <td><?=$produit['produit-total'] ?> €</td>
                            <td>
                            <?php } foreach($produitsAll['commande'] as $commande){ ?>
                                         <?=$commande?>€
                            </td>
                        </tr>
                       <?php } ?>
                    </tbody>
                </table>

</div>                       
</div>                       
</div>                       
                          
