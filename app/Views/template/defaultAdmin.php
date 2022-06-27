<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Flex:opsz,wght@8..144,100;8..144,300;8..144,500;8..144,700;8..144,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../public/css/adminMode.css" />
    <title>Document</title>
</head>
<body>
     <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="../public/index.php?p=admin.posts.index">
                        <span class="icon"><ion-icon name="terminal-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../public/index.php?p=admin.users.index">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Yusers</span>
                    </a>
                </li>
                <li>
                    <a href="../public/index.php?p=admin.categories.index">
                        <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                        <span class="title">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="../public/index.php?p=admin.produits.index">
                        <span class="icon"><ion-icon name="pricetag-outline"></ion-icon></span>
                        <span class="title">Produits</span>
                    </a>
                </li>
                <li>
                    <a href="../public/index.php?p=admin.commandes.index">
                        <span class="icon"><ion-icon name="bag-check-outline"></ion-icon></span>
                        <span class="title">Commandes</span>
                    </a>
                </li>
                <li>
                    <a href="../public/index.php">
                        <span class="icon"><ion-icon name="desktop-outline"></ion-icon></span>
                        <span class="title">Site</span>
                    </a>
                </li>
                <li>
                    <a href="../public/index.php?p=users.logout">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Deconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>\mvc\public\index.php

    <!-- main -->

    <div class="main">
        <div class="topbar">
            <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
            </div>
            <div class="titre">
                <h1 style=" color:red;">Admin</h1>
            </div>   
            <!-- userimg -->
            <div class="user">
                <img src="../public/asset/img/use.png" alt="user">
            </div>    
        </div>
        <!-- cards -->
        <div class="cardBox">
            <div class="card">
                <div>
           
                    <div id="counter" class="numbers">0</div>
                    <div class="cardName">Daily views</div>
                </div>
                <div class="iconBx">
                <ion-icon name="analytics-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers"><?=count($users)?></div>
                    <div class="cardName">yuser</div>
                </div>
                <div class="iconBx">
                <ion-icon name="people-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers"><?=count($produits)?></div>
                    <div class="cardName">nb produit</div>
                </div>
                <div class="iconBx">
                <ion-icon name="pricetags-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers"><?=count($commande)?></div>
                    <div class="cardName">vente</div>
                </div>
                <div class="iconBx">
                <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>
        </div>
        <?= $content; ?>
        <!-- details -->
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- add hoverer class in selected list item -->
<script src="../public/js/admin.js"></script>
</body>
</html>