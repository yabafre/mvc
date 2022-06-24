<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Flex:opsz,wght@8..144,100;8..144,300;8..144,500;8..144,700;8..144,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../public/css/style.css" />
    <link rel="stylesheet" href="../public/css/log.css" />
    <link rel="stylesheet" href="../public/css/view.css" />
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../public/js/script.js" defer></script>
    <script src="../public/js/logScript.js" defer></script>
    

    <link rel="icon" href="../public/assets/yq.png">

    <title><?= App::getInstance()->title; ?></title>


</head>

<body>

<header>
      <nav>
        <div>
          <a href="../public/index.php" class="nav-icon" aria-label="visit homepage" aria-current="page">
            <img src="../public/asset/log/yuniq 2.svg" alt="icon logo">
            <span></span>
          </a>
        </div>
        <div class="search">
            <a href="#"><img src="../public/asset/icon/search.svg" alt=""></a>
            <input type="search" name="" id="search" placeholder="Recherche">
        </div>
        <div class="nav-list">
                <a href="../public/index.php?p=users.login" class="sign-user" aria-label="Sign in page">
                  <img src="../public/asset/icon/account.png" alt="user-icon">
                </a>
                <div class="sign-btns">
                  <a href="../public/index.php?p=users.login" class="btn-connexion">Connexion</a>
                  <a href="#" class="btn-deconnexion">Deconnexion</a>
                </div>
              <div>
                <?php
              if(!empty($_SESSION) && $_SESSION['user']->role=='ROLE_ADMIN'){
                    ?><a href="?p=admin.posts.index" style='color:red;'>ADMIN</a><?php
                }
                ?>
              </div>
              <div class="main-navlinks">
                <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
                  <img src="../public/asset/icon/Vector.png" alt="">
                </button>
                <div class="navlinks-container">
                  <a href="defaul.php" aria-current="page">Home</a>
                  <a href="#" aria-current="page">favoris</a>
                  <a href="#" aria-current="page">Shop</a>
                  <a href="#" aria-current="page">Tendences</a>
                  <a href="#" aria-current="page">Editos</a>
                  <a href="#" aria-current="page">A propos de nous</a>
                </div>
              </div>
          </div>
      </nav>
</header>


<?= $content; ?>

<section class="secu">
      <div class="ath">
          <img src="../public/asset/icon/shield.svg" alt="#" />
          <div>
            <h1>Sneakers authentiques</h1>
            <p>Tous les produits vendus sur Yuniq sont authentifiés par nos experts avant de vous être envoyés.</p>
          </div>
      </div>
      <div class="ath">
          <img src="../public/asset/icon/4x.svg" alt="#" />
          <div>
            <h1>Paiement en plusieurs fois</h1>
            <p>Si vous le souhaitez, vous pouvez payer en 2, 3, 4 ou 10 fois très simplement lors du paiement.</p>
          </div>
      </div>
      <div class="ath">
          <img src="../public/asset/icon/Icone_Retours_Gratuits_6ed3e44d-6e4b-42e7-9cfb-881069114203_800x 1.svg" alt="#" />
          <div>
            <h1>Retours offerts</h1>
            <p>Les sneakers ne vous conviennent pas ? Renvoyez-les gratuitement !</p>
          </div>
      </div>
</section>

<footer>
          <div class="contact">
            <div class="sav">
              <div class="social">
                            <h2>Nos réseaux sociaux</h2>
                            <nav>
                              <ul>
                                <li>
                                  <a href="#"><img src="../public/asset/icon/insta.svg" alt=""></a>
                                </li>
                                <li>
                                  <a href="#"><img src="../public/asset/icon/fb.svg" alt=""></a>
                                </li>
                                <li>
                                  <a href="#"><img src="../public/asset/icon/tiktok.svg" alt=""></a>
                                </li>
                                <li>
                                  <a href="#"><img src="../public/asset/icon/pint.svg" alt=""></a>
                                </li>
                                <li>
                                  <a href="#"><img src="../public/asset/icon/youtube.svg" alt=""></a>
                                </li>
                              </ul>
                            </nav>
              </div>
              <div class="incontact">
                            <div class="fram">
                              <h1>Contact</h1>
                              <p>une équipe d'experts à votre service au :</p>
                              <span>+33 0 00 00 00 00</span>
                              <p>Du lundi au vendredi de 09h à 20h</p>
                            </div>
                            <div class="fram2">
                              <button type="submit">
                                 <span>Nous écrire</span>
                              </button>
                            </div>
                          </div> 
            </div>
            <div class="wro">
                <a href="#">Prochaine sortie</a>
                <a href="#">marque</a>
                <a href="#">Categorie</a>
                <a href="#">Tendence</a>
            </div>
            <div class="newsletter">
              <p><span>Inscrivez vous à la newsletter :</span> Une suprise vous attend 😲</p>
              <p class="e-mail">Votre adresse e-mail</p>
              <div class="mail">
                <div class="enterMail"><input type="mail" name="mail" id="mail"></div>
                <button type="submit"><span>Envoyez</span></button>
              </div>
            </div>
          </div>
        <div class="mention">
          <a href="#">Mentions légales</a>
          <a href="#">Charte de confidentialité</a>
          <a href="#">FAQ</a>
          <a href="#">CGV</a>
        </div>
        <div class="copiryth">
          <img src="../public/asset/icon/Frame 368.svg" alt="#">
          <p>© <text id="current_date"></text>  YUNIQ</p>
        </div>
    </footer>

</body>
</html>
