<div class="dash produits">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2> Produits</h2>
                    <a href="#" class="btn"> View All</a>
                </div>

                <form method="post"  enctype="multipart/form-data">
                    <?= $form->input('titre', 'Tire de la catégorie'); ?>
                    <?= $form->input('img', 'image de la categorie', ['type' => 'file']); ?>
                    <button class="btn btn-primary">Sauvegarder</button>
                    <button ><a href="../public/index.php?p=admin.categories.index"> retour</a></button>
                </form>
                
            </div>
</div>