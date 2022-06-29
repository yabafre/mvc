<div class="wallAccount">
    <p>    <br><br>   Yuser </p>
</div>
<section class="mainAccount">
      <div class="header">
          <div class="nv">
            <a href="../public/index.php?p=users.logout">Déconnexion</a>
          </div>
          <h1><a href="../public/index.php"><ion-icon name="home-outline"></ion-icon></a></h1>
      </div>

  <div class="abox">
      <div class="form-wrap">
                <div class="dash-user"  id="btn">
                  <button class="btn-user" onclick="filterSelection('action1')">Acceuil</button>
                  <button class="btn-user" onclick="filterSelection('action2')">Commandes</button>
                  <button class="btn-user" onclick="filterSelection('action3')">Editer</button>
                </div>          
                <div class="content action1">
                  <h1>Hello, <br><?=$users->firstname?>  <?=$users->lastname?> !</h1>
                </div>
                <div class="content action2">
                  <h2>Vos commandes</h2>
                  <br>
                  <table class="table">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>date</td>
                                <td>Image</td>
                                <td>Titre</td>
                                <td>adresse</td>
                                <td>Quantite&ensp;</td>
                                <td><text>Total&emsp;</text> </td>
                            </tr>
                            </thead>
                            <?php foreach($commandes as $commande): ?>
                              <?php  $donnees = unserialize($commande->donnees); foreach($donnees as $donnee): ?>
                            <tbody>
                                <tr>
                              <td><?= $commande->id ?></td>
                              <td><?= date('d/m/Y', strtotime($commande->date)) ?></td>
                              <td><a href="index.php?p=produits.show&id=<?= $donnee['produit-id'] ?>"> <img src='../public/asset/produits/<?= $donnee["produit-img1"]?>' alt="#" style="width:50%;"></a></td>
                              <td><?= $donnee["produit-titre"] ?></td>
                              <td><?= $donnee["produit-adresse"] ?></td>
                              <td><?= $donnee["produit-nbr"] ?></td>
                              <td><?= $commande->prix_total?> €</td>
                            </tr>  
                          </tbody>
                          <?php endforeach; ?>
                          <?php endforeach; ?>
                        </table>
                </div>
                <div class="content action3">
                  <form method="post" autocomplete="off" class="edit-up-form" action="../public/index.php?p=users.modification">
                    <div class="logo2">
                      <h4>Modification</h4>
                    </div>

                    <div class="actuel-form">
                      <div class="input-wrap">
                        <?= $form->input('firstname', 'Prénom'); ?>
                      </div>
                      
                      <div class="input-wrap">
                        <?= $form->input('lastname', 'Nom'); ?>
                      </div>
                      
                      <div class="input-wrap">
                        <?= $form->input('email', 'Email', ['type' => 'email']); ?>
                      </div>
                      
                      <div class="input-wrap">
                        <?= $form->input('tel', 'Téléphone', ['type' => 'tel', 'maxlength' => '10']); ?>
                      </div>
                      
                      <div class="input-wrap">
                        <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
                      </div>
                      <div class="input-wrap">
                        <?= $form->input('password', 'Confirmation mot de passe', ['type' => 'password']); ?>
                      </div>
                      
                      <input type="submit" value="sauvegarder" class="signA-btn" />
                    </div>
                  </form>
                </div>
      </div>
  </div>
</section>