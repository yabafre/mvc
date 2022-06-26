<div class="wall">
    <video autoplay muted loop >
      <source src="../public/asset/wallper/hour3.mp4" type="video/mp4">
    </video>
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
                             </a>
                            
                         </div>
                         <div class="element">
                             <!-- <p><h1><?= $produit->titre; ?></h1> -->
                             <img src="../public/asset/produits/<?= $produit->img2; ?>" alt="produit" style='width:100%;'>
                             </p>
                         </div>
                         <div class="element">
                             <!-- <p><h1><?= $produit->titre; ?></h1> -->
                             <img src="../public/asset/produits/<?= $produit->img3; ?>" alt="produit" style='width:100%;'>
                             </p>
                         </div>                         
                     <?php endforeach; ?>
                <?php } else{?>
                <h1>Dernnière sortie</h1>
                <?php foreach ($last as $lasts): ?>
                <div class="element last">
                <a href="index.php?p=produits.show&id=<?= $lasts->id?>">
                             <img src="../public/asset/produits/<?= $lasts->img1; ?>" alt="produit" style='width:100%;'>
                             </a>
                </div>
                    <?php endforeach; ?>
                    <?php }?>
                </div>
                <div class="board">
            
                </div>
    </div>

</section>
