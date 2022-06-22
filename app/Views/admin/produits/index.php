<div class="dash produits">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2> Administrer les produits</h2>
                    <a href="?p=admin.produits.add" class="btn"> Ajouter</a>
                </div>
              
                <h1>Administrer les produits</h1>
                                
                <table class="table">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Image</td>
                        <td>Titre</td>
                        <td>Prix</td>
                        <td>Categories</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody></tbody>
                        <?php foreach($produits as $produit): ?>
                        <tr>
                            <td><?= $produit->id; ?></td>
                            <td><img src="../public/asset/produits/<?= $produit->img; ?>" style="width: 15%;"></td>
                            <td><?= $produit->titre; ?></td>
                            <td><?= $produit->prix; ?> €</td>
                            <td><?= $produit->category_id; ?></td>
                            <td>
                                <a class="btn btn-primary" href="?p=admin.produits.edit&id=<?= $produit->id; ?>">Editer</a>
                                <form action="?p=admin.produits.delete" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $produit->id ?>">
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>    
        </div>    
        
