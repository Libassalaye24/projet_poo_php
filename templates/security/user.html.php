<table class="table">
    <thead>
        <tr>
            <th>NomComplet</th>
            <th>email</th>
            <th>role</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user): ?>
        <tr>
            <td scope="row"><?=$user->nom_complet?></td>
            <td><?=$user->login?></td>
            <td><?=$user->role?></td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>