<div class="wallAccount">
    <p>    <br><br>   Yuser </p>
</div>
<section class="mainAccount">
      <div class="header">
        <div class="nv">
          <a href="../public/index.php?p=users.logout">Déconnexion</a>
        </div>
        <h1>Hello, <?=$users->firstname?>  <?=$users->lastname?> !</h1>
    </div>

  <div class="abox">
      <div class="form-wrap">
            <div class="dash-user"  id="btn">
               <button class="btn-user" onclick="filterSelection('action1')">Editer</button>
               <button class="btn-user" onclick="filterSelection('action2')">Commandes</button>
               <button class="btn-user" onclick="filterSelection('action3')">Editer</button>
            </div>          
          <div class="content action1">
         
          </div>
          <div class="content action2">
          <?php foreach($commande as $commandes):?>
            <p><?php var_dump(unserialize($commandes->donnees))?></p>

            <?php endforeach; ?>
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