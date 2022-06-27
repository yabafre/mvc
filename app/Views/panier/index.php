<div class="pwallShow">
<?php if(!empty($panier)){ ?>
    <p>    <br><br>   PANIER </p><?php
  }else{ ?>
      <p><br><br>Panier vide</p>
<?php
  }   ?>
</div>
<section class="main6">
<section>
    <?php if(!empty($panier)){ ?>
    <div class="Panier">
        <div class="ContenuPanier">
                <form class="form-panier" action="index.php?p=panier.recapitulatif" method="POST">
                <div class="TableauPanier">
                    <div class="Colonne">
                        <div class="TProduits"><p class="CHAKRASemiBold font24">Produits</p></div>
                        <?php foreach ($panier as $idProduit => $champs): ?>
                            <!-- foreach start -->
                            <input type="hidden" id="produit-id-<?=$idProduit?>" name="produit-id-<?=$idProduit?>"  class="control-panier" value="<?= $idProduit?>">
                            <input type="hidden" id="produit-<?=$idProduit?>-total" name="produit-<?=$idProduit?>-total" class="control-panier" value="<?= $champs['prix']* $champs['nbr']?>">
                            <input type="hidden" name="produit-<?=$idProduit?>-img1" id="produit-img1-<?=$idProduit?>" class="form-control" value="<?=$champs['img1']?>">
                            <div class="Produit">
                                <div class="ImgProduit">
                                    <img src="../public/asset/produits/<?=$champs['img1']?>" alt="#">
                                </div>
                                <div class="InfoProduit">
                                    <div class="TitreProduit">
                                        <p class="CHAKRASemiBold font24">
                                            <input type="text" placefolder="Produit" id="produit-<?=$idProduit?>-titre-disabled" name="produit-<?=$idProduit?>-titre-disabled" class="control-panier" value="<?=$champs['titre']?>" disabled="disabled">
                                        </p>
                                        <p class="CHAKRASemiBold font24">
                                            <input type="number" id="produit-<?=$idProduit?>-nbr" name="produit-<?=$idProduit?>-nbr" class="control-panier produit-nbr" value="<?=$champs['nbr']?>"  data-produit="<?=$idProduit?>" data-prix="<?=$champs['prix']?>">
                                        </p>
                                        <p class="policeCHAKRA font24"><input type="text" id="produit-<?=$idProduit?>-unite-disabled" name="produit-<?=$idProduit?>-unite-disabled" class="control-panier" value="<?=$champs['prix']?>€" disabled="disabled"></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- foreach end -->
                        </div>
                        <div class="Colonne">
                            <div class="TProduits"><p class="CHAKRASemiBold font24">Prix</p></div>
                            <!-- foreach start -->
                            <?php foreach ($panier as $idProduit => $champs): ?>
                                <div class="Produit">
                                    <div class="InfoProduit">
                                        <input type="text" id="produit-<?=$idProduit?>-total-disabled" name="produit-<?=$idProduit?>-total-disabled" class="control-panier produit-total" value="<?=$champs['prix']* $champs['nbr']?>€" disabled="disabled">
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <!-- foreach end -->
                            </div>
                            
                            <div class="Colonne">
                                <div class="TProduits"><p class="CHAKRASemiBold font24">Supprimer</p></div>
                                <?php foreach ($panier as $idProduit => $champs): ?>
                                <!-- foreach start -->
                                <div class="Produit">
                                    <div class="InfoProduit">
                                        <input type="hidden" name="" id="produit-<?=$idProduit?>" value="<?=$idProduit?>">
                                        <a href="index.php?p=panier.delete&idProduit=<?=$idProduit?>">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.66663 11.6667H33.3333M31.6666 11.6667L30.2216 31.9033C30.1618 32.7443 29.7855 33.5314 29.1685 34.106C28.5515 34.6806 27.7397 35 26.8966 35H13.1033C12.2602 35 11.4484 34.6806 10.8314 34.106C10.2145 33.5314 9.83815 32.7443 9.77829 31.9033L8.33329 11.6667H31.6666ZM16.6666 18.3333V28.3333V18.3333ZM23.3333 18.3333V28.3333V18.3333ZM25 11.6667V6.66667C25 6.22464 24.8244 5.80072 24.5118 5.48816C24.1992 5.17559 23.7753 5 23.3333 5H16.6666C16.2246 5 15.8007 5.17559 15.4881 5.48816C15.1756 5.80072 15 6.22464 15 6.66667V11.6667H25Z" stroke="#112B3D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <!-- foreach end -->

                    </div>
                </div>
                <div class="Resum">
                    <div class="Titre"><p class="CHAKRAMedium font32">Résumé du panier</p></div>
                    <div class="ContenuResume">
                        <div class="Resumee">
                            <div class="Objet">
                                <p class="CHAKRARegular font24">Frais de Livraison</p>
                                <p class="CHAKRAMedium font24">4,99€</p>
                            </div>
                        </div>
                        <div class="Total">
                                <p class="CHAKRASemiBold font24">Total du panier</p>
                                <p class="CHAKRASemiBold font24"> <input type="text" id="commande-total-disabled" name="commande-total-disabled" class="CHAKRASemiBold font24" value="<?=$prixTotalCommande?>€" disabled="disabled">
                                <input type="hidden" id="commande-total" name="commande-total" class="CHAKRASemiBold font24" value="<?=$prixTotalCommande?>"></p>
                        </div>
                        <button class="commande">Valider le panier</button>
                        <div class="vider"><a href="index.php?p=panier.deletePanier" class="CHAKRARegular font20">Vider panier</a></div>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <?php
  }else{ ?>
      <p class="noth" >.</p>
<?php
  }   ?>
</div>
    </section>
</section>

<script>

  var elements = document.getElementsByClassName('produit-nbr');
  var prixCommande = document.getElementById('commande-total');
  var prixCommandeDisabled = document.getElementById('commande-total-disabled');
  var prixTotalCommande = 0;
  if(elements){
    window.addEventListener('change', changePrix)
  }

  function changePrix(){
    prixTotalCommande = 0;
    for (var i = 0; i < elements.length; i++) {

      var valeur = elements[i].value;
      var produit = elements[i].dataset.produit;
      var prix = elements[i].dataset.prix;
     
      var prixUnite = document.getElementById('produit-'+produit+'-total');
      var prixUniteDisabled = document.getElementById('produit-'+produit+'-total-disabled');

      var resulatPrixtotal = prix*valeur+4.99;

      prixUniteDisabled.setAttribute('value', resulatPrixtotal+"€")
      prixUnite.setAttribute('value', resulatPrixtotal)

      prixTotalCommande = prixTotalCommande + resulatPrixtotal;

      prixCommandeDisabled.setAttribute('value', prixTotalCommande+"€")
      prixCommande.setAttribute('value', prixTotalCommande)

    }

  }

</script>