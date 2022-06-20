<div class="dash users">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2> Yusers edit</h2>
                    <a href="#" class="btn"> View All</a>
                </div>
              
                <form method="post" enctype="multipart/form-data">
                
                    <?= $form->input('firstname', 'Nom'); ?>
                    <?= $form->input('lastname', 'Prénom'); ?>
                    <?= $form->input('email', 'Email', ); ?>
                    <?= $form->input('tel', 'Téléphone'); ?>
                    <?= $form->input('role', 'Role'); ?>
                    <button class="btn btn-primary">Sauvegarder</button>
                    <button ><a href="../public/index.php?p=admin.users.index"> retour</a></button>
                </form>
            </div>
        </div>