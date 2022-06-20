<div class="wall">
    <video autoplay muted loop >
      <source src="../public/asset/wallper/hour3.mp4" type="video/mp4">
    </video>
</div>
<section class="post">
    <div id="categorie" class="categorie linked-select" data_target="produit" data_source="/app/Views/produits/">
        <ul>
            <?php foreach ($categories as $categorie): ?>
                <li id="<?=$categorie->id?>" class="<?= $categorie->titre; ?>"><a href="index.php?categorie=<?=$categorie->id?>"><img src="../public/asset/produits/<?= $categorie->img; ?>"></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div id="produit" class="produits linked-select" data_target="article">
                <?php if (isset($_GET["categorie"])){?>
                     <?php foreach ($produits as $produit): ?>
                        <div>
                             <p><h1><?= $produit->titre; ?></h1>
                             <img src="../public/asset/produits<?= $produit->img; ?>" alt="produit" style='width:23%;'>
                             </p>
                         </div>
                     <?php endforeach; ?>
               <?php }?>
    </div>

    <!-- <div id="article" class="article linked-select" data_target="">
        <p><h1><?= $produit->titre; ?></h1></p>
        <p><h1><?= $produit->img; ?></h1></p>
        <p><h1><?= $produit->description; ?></h1></p>
    </div> -->
</section>
