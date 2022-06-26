<div class="wallShow">
    <p>    <br><br>   Produit </p>
</div>
<section class="main3">
    <section class="product">
            <div class="produitInfo">
            <?php foreach($categories as $categorie){?>
                <?php if ($categorie->id == $produit->category_id){ ?>
                    <h1><?=$categorie->titre?></h1>
                <?php } } ?>
            <h2><?=$produit->titre?></h2>
            <h3><?=$produit->prix?>€</h3>
            </div>
            <div class="w3-content" style="max-width:725px">
                <img class="mySlides" src="../public/asset/produits/<?=$produit->img1?>" style="width:90%;display:none">
                <img class="mySlides" src="../public/asset/produits/<?=$produit->img2?>" style="width:90%">
                <img class="mySlides" src="../public/asset/produits/<?=$produit->img3?>" style="width:90%;display:none">

                <div class="w3-row-padding w3-section">
                    <div class="w3-col s4">
                        <img class="demo w3-opacity w3-hover-opacity-off" src="../public/asset/produits/<?=$produit->img1?>" style="width:90%;cursor:pointer" onclick="currentDiv(1)">
                    </div>
                    <div class="w3-col s4">
                        <img class="demo w3-opacity w3-hover-opacity-off" src="../public/asset/produits/<?=$produit->img2?>" style="width:90%;cursor:pointer" onclick="currentDiv(2)">
                    </div>
                    <div class="w3-col s4">
                        <img class="demo w3-opacity w3-hover-opacity-off" src="../public/asset/produits/<?=$produit->img3?>" style="width:90%;cursor:pointer" onclick="currentDiv(3)">
                    </div>
                </div>
            </div>
        </section>
        <section class="detail">
        <form method="post" action="index.php?p=panier.add">
           <div class="select">
                <div class="title">
                    <h3>Size <span>EU</span></h3><ion-icon name="chevron-down-outline"></ion-icon>
                </div>
                <div class="var">
                    <ul class="size">
                        <li><input class="but-size" name="nbr" id="nbr"type="button" value="5.5"></li>
                        <li><input class="but-size" name="nbr" id="nbr"type="button" value="6.5"></li>
                        <li><input class="but-size" name="nbr" id="nbr" type="button" value="7"></li>
                        <li><input class="but-size" name="nbr" id="nbr" type="button" value="7.5"></li>
                        <li><input class="but-size" name="nbr" id="nbr" type="button" value="8"></li>
                        <li><input class="but-size" name="nbr" id="nbr" type="button" value="8.5"></li>
                        <li><input class="but-size" name="nbr" id="nbr" type="button" value="9"></li>
                        <li><input class="but-size" name="nbr" id="nbr"  type="button" value="9.5"></li>
                        <li><input class="but-size" name="nbr" id="nbr" type="button" value="10.5"></li>
                        <li><input class="but-size" name="nbr" id="nbr" type="button" value="11"></li>
                        <li><input class="but-size" name="nbr" id="nbr" type="button" value="11.5"></li>
                        <li><input class="but-size" name="nbr" id="nbr" type="button" value="12"></li>
                    </ul>
                </div>
           </div>
                <input type="hidden" name="idProduit" id="idProduit" class="form-control" value="<?=$produit->id;?>">
    <input type="hidden" name="prix" id="prix" class="form-control" value="<?=$produit->prix;?>">
    <input type="hidden" name="titre" id="titre" class="form-control" value="<?=$produit->titre;?>">
           <div class="description">
                <div class="title">
                    <h3>Description</h3><ion-icon name="chevron-down-outline"></ion-icon>
                </div>
                <div class="var"><p><?=$produit->description?></p></div>
           </div>
            <div class="check-point">
                <select name="nbr" id="nbr" class="quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                <button>ADD TO BAG</button>
            </div>
            </form>
        </section>
</section>
