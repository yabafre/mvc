<div class="dash users">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h1>Administrer les Yusers </h1>
                    <a href="?p=admin.users.add" class="btn"> Ajouter</a>
                </div>
                
                <h2>Recent yusers</h2>
                
                <table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Prénom</td>
        <td>Email</td>
        <td>Téléphone</td>
        <td>Role</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user->id; ?></td>
            <td><?= $user->firstname; ?></td>
            <td><?= $user->lastname; ?></td>
            <td><?= $user->email; ?></td>
            <td>0<?= $user->tel; ?></td>
            <td><?= $user->role; ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.users.edit&id=<?= $user->id; ?>">Editer</a>
                <form action="?p=admin.users.delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $user->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
            </div>    
        </div>    
        
