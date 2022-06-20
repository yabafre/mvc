
    <?php if($errors): ?>
        <div class="alert alert-danger">
            Identifiants incorrects
            </div>

     <?php endif; ?>

<main>

  <div class="box">
    <div class="inner-box">
      <div class="forms-wrap">
        <form method="post" autocomplete="off" class="sign-in-form">
          <div class="logo">
            <!-- <img src="./img/logo.png" alt="easyclass" /> -->
            <h4>Yuser</h4>
          </div>
          
          <div class="heading">
            <h2>De retour</h2>
            <h6>Prêt à nous rejoindre?</h6>
            <a class="toggle">Inscription</a>
          </div>
          
          <div class="actual-form">
            <div class="input-wrap">
            <?= $form->input('email', 'Email', ['type' => 'email']); ?>
            </div>
            
            <div class="input-wrap">
              <?= $form->input('password', 'Mot de passe', ['type' => 'password']);?>
            </div>
            
              <input type="submit" value="Connexion" class="sign-btn" />
            </div>
          </form>
          
          <form method="post" autocomplete="off" class="sign-up-form" action="../public/index.php?p=users.inscription">
            <div class="logo">
              <img src="./img/logo.png" alt="easyclass" />
              <h4>Yuser</h4>
            </div>
            
            <div class="heading">
              <h2>Bienvenue</h2>
              <h6>Déjà un membre ?</h6>
              <a  class="toggle">Connexion</a>
            </div>
            
            <div class="actual-form">
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
              
              <input type="submit" value="Inscription" class="sign-btn" />
            </div>
          </form>
        </div>
        
        <div class="carousel">
          <div class="images-wrapper">
            <img src="../public/asset/wallper/Saccai.gif" class="image img-1 show" alt="" />
            <img src="../public/asset/wallper/Jordan.gif" class="image img-2" alt="" />
            <img src="../public/asset/wallper/Converse.gif" class="image img-3" alt="" />
          </div>
          
          <div class="text-slider">
            <div class="text-wrap">
              <div class="text-group">
                <p>Tout à gout</p>
                <p>Prend le contrôle</p>
                <p>Vie de ta passion <br><br>
                  Ne rate plus aucun drop</p>
              </div>
            </div>
            
            <div class="bullets">
              <span class="active" data-value="1"></span>
              <span data-value="2"></span>
              <span data-value="3"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  