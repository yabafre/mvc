<div class="dash users">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h1>Administrer les Yusers </h1>
                    <form method="post" autocomplete="off" action="../public/index.php?p=admin.users.add">
                        <?= $form->input('firstname', 'Prénom'); ?>
                        <?= $form->input('lastname', 'Nom'); ?>
                        <?= $form->input('email', 'Email', ['type' => 'email']); ?>
                        <?= $form->input('tel', 'Téléphone', ['type' => 'tel', 'maxlength' => '10']); ?>
                        <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
                        <input type="submit" value="Ajouter" class="btn" />
                    </form>
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
        
