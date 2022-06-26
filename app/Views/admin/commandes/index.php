<div class="dash commandess">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h1>Admin </h1>
                </div>
            
                <h2>Recent orders</h2>
                <table class="table">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Date</td>
                            <td>prix total</td>
                            <td>User</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($commande as $commandes): ?>
                            <tr>
                                <td><?= $commandes->id; ?></td>
                                <td><?= $commandes->date; ?></td>
                                <td><?= $commandes->prix_total; ?></td>
                                <td><?= $commandes->user_id; ?></td>
                                <td>
                                    <a class="btn btn-primary" href="?p=admin.commandes.edit&id=<?= $commandes->id; ?>">Editer</a>
                                    <form action="?p=admin.commandes.delete" method="post" style="display: inline;">
                                        <input type="hidden" name="id" value="<?= $commandes->id ?>">
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                </table>
            </div>    
        </div>    
        
