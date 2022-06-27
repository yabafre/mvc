<div class="pwallShow">
<p><br><br></p>
</div>
<section class="post">
    <div id="categorie" class="categorie linked-select" data_target="produit" data_source="/app/Views/produits/">
        <ul>
            <?php foreach ($categories as $categorie): ?>
                <li id="<?=$categorie->id?>" class="<?= $categorie->titre; ?>"><a href="index.php?categorie=<?=$categorie->id?>&#categorie"><img src="../public/asset/produits/<?= $categorie->img; ?>"></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div id="view" class="view linked-select" data_target="article">
            <div class="produit">
                <?php if (isset($_GET["categorie"])){?>
                     <?php foreach ($produits as $produit): ?>
                        <div class="element">
                             <!-- <p><h1><?= $produit->titre; ?></h1> -->
                             <a href="index.php?p=produits.show&id=<?= $produit->id?>">
                             <img src="../public/asset/produits/<?= $produit->img1; ?>" alt="produit" style='width:100%;'>
                             <h2 class="namePro"><?= $produit->prix; ?>€<br><?= $produit->titre; ?></h2>
                             </a>
                         </div>
                                           
                     <?php endforeach; ?>
                <?php } else{?>
                <h1>Dernnière sortie</h1>
                <?php foreach ($last as $lasts): ?>
                <div class="element last">
                        <a href="index.php?p=produits.show&id=<?= $lasts->id?>">
                             <img src="../public/asset/produits/<?= $lasts->img1; ?>" alt="produit" style='width:100%;'>
                             <h2 class="namePro"><?= $lasts->prix; ?>€<br><?= $lasts->titre; ?></h2>
                        </a>
                </div>
                    <?php endforeach; ?>
                    <?php }?>
                </div>
                
    </div>
    <div id="view" class="view promo" data_target="article">
            <div class="produit">
                <h1>Exclusive</h1>
                <?php foreach ($last as $lasts): ?>
                <div class="element last">
                        <a href="index.php?p=produits.show&id=<?= $lasts->id?>">
                             <img src="../public/asset/produits/<?= $lasts->img1; ?>" alt="produit" style='width:100%;'>
                             <h2 class="namePro"><?= $lasts->prix; ?>€<br><?= $lasts->titre; ?></h2>
                        </a>
                </div>
                    <?php endforeach; ?>
             </div>
    </div>
    <div class="blin">
                <div class="board">
                    vfjvnfnvfn<br>
                    vfjvnfnvfn<br>
                    vfjvnfnvfn<br>
                </div>
                </div>
</section>
