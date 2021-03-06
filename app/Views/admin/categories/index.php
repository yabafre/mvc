<div class="dash categories">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h1> Administrer les catégories</h1>
                    <a href="?p=admin.categories.add" class="btn"> Ajouter</a>
                </div>
                
                
                
                <table class="table">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Titre</td>
                        <td>Img</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($items as $category): ?>
                        <tr>
                            <td><?= $category->id; ?></td>
                            <td><?= $category->titre; ?></td>
                            <td><img src="../public/asset/produits/<?= $category->img; ?>" style="width: 15%;"></td>
                            <td>
                                <a class="btn btn-primary" href="?p=admin.categories.edit&id=<?= $category->id; ?>">Editer</a>
                                <form action="?p=admin.categories.delete" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $category->id ?>">
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>    
        </div>    
        
