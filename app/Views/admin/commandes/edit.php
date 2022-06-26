
        <div class="dash commandes">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2> Commandes</h2>
                    <a href="#" class="btn"> View All</a>
                </div>
              
                <form method="post" enctype="multipart/form-data"  action="../public/index.php?p=admin.commandes.add">
                
                    <?= $form->input('date', 'date d\'achat', ['type' => 'date']); ?>
                    <?= $form->input('donnees', 'deetail', ['type' => 'textarea']); ?>
                    <button class="btn btn-primary">Sauvegarder</button>
                    <button ><a href="../public/index.php?p=admin.commandes.index"> retour</a></button>
                </form>
            </div>
        </div>