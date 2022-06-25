

        <div class="dash produits">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2> Produits</h2>
                    <a href="#" class="btn"> View All</a>
                </div>
              
                <form method="post" enctype="multipart/form-data">
                
                    <?= $form->input('titre', 'Titre de l\'article'); ?>
                
                    <?= $form->input('img1', 'image du produit', ['type' => 'file']); ?>
                    <?= $form->input('img2', 'image du produit', ['type' => 'file']); ?>
                    <?= $form->input('img3', 'image du produit', ['type' => 'file']); ?>
                    <?= $form->input('prix', 'prix du produit', ['type' => 'number']); ?>
                    <?= $form->input('description', 'description', ['type' => 'textarea']); ?>
                    <?= $form->select('category_id', 'Catégorie', $categories); ?>
                    <button class="btn btn-primary">Sauvegarder</button>
                    <button ><a href="../public/index.php?p=admin.produits.index"> retour</a></button>
                </form>
            </div>
        </div>


