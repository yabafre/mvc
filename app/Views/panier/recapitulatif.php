<div class="wallShow">
    <p><br>Récap commande</p>
</div>

<div class="commandeDash">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h1>hey </h1>
                    <h1> Total Commande : <?php foreach($produitsAll['commande'] as $commande): ?>
                                         <?=$commande?>€ <?php endforeach; ?></h1>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Titre</td>
                        <td>Image</td>
                        <td>Quantité</td>
                        <td>Prix Total</td>
                    </tr>
                    </thead>
                    <tbody></tbody>
                        <?php
                        foreach($produitsAll['produit'] as $produit): ?>
                        <tr>
                            <td><?=$produit['produit']->id ?></td>
                            <td><?=$produit['produit']->titre ?></td>
                            <td><img src="../public/asset/produits/<?= $produit['produit']->img1; ?>" style="width:40%"></td>
                            <td><?=$produit['produit-nbr'] ?></td>
                            <td><?=$produit['produit-total'] ?> €</td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
                <form action="index.php?p=panier.confirmation" method="POST">

                    <?php foreach($produitsAll['produit'] as $id => $produit){ ?>

                            
                        <input type="hidden" name="produit-id-<?=$id;?>" id="produit-id-<?=$id;?>" value="<?=$id;?>">
                        <input type="hidden" name="produit-titre-<?=$id;?>" id="produit-titre-<?=$id;?>" value="<?=$produit['produit']->titre;?>" >
                        <input type="hidden" name="produit-nbr-<?=$id;?>" id="produit-nbr-<?=$id;?>" value="<?=$produit['produit-nbr']?>" >
                        <input type="hidden" name="produit-total-<?=$id;?>" id="produit-total-<?=$id;?>" value="<?=$produit['produit-total']?>" >
                        <input type="text" name="produit-adresse-<?=$id;?>" id="produit-adresse-<?=$id;?>">

                    <?php }?>

                    <?php foreach($produitsAll['commande'] as $commande){ ?>
                    <input type="hidden" name="commande-total" id="commande-total" value="<?=$commande;?>" >
                    <?php }?>

                    <?php 
                    if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])){
                    ?>
                    <input type="hidden" name="user_id" id="user_id" value="<?=$_SESSION['user']->id?>" >
                    <?php } ?>

                    <?php foreach($produitsAll['produit'] as $produit):?>
                        <input type="hidden" name="produit-img1-<?=$produit['produit']->id ?>" id="produit-img1-<?=$produit['produit']->id ?>" value="<?= $produit['produit']->img1; ?>" >

                        <?php endforeach?>
                            <button class="btn btn-primary w-100">Payer</button>
                                                                
                    </form>
                    
     </div>
</div>          
