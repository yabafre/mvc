<div class="wallAccount">
    <p>    <br><br>   Yuser </p>
</div>
<section class="mainAccount">
    <div class="header">
        <h1>Mon compte</h1>
        <div class="nv">
        <p >
        Hello, <?=$users->firstname?>  <?=$users->lastname?> !
        </p>
        <a href="../public/index.php?p=users.logout">Déconnexion</a>
        </div>
    </div>

  <div class="abox">
      <div class="form-wrap">
            <div class="dash-user">
  
            </div>          
          <form method="post" autocomplete="off" class="edit-up-form" action="../public/index.php?p=users.inscription">
            <div class="logo2">
              <h4>Yuser</h4>
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
</section>