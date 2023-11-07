<table class="table table-bordered">
    <thead>
        <tr>
            <th>n°</th>
            <th>Sequência</th>
            <th>x</th>
        </tr>
    </thead>
    <tbody>

        <?php $contx=1; foreach($sequencias as $sq):?>
        <tr>
            <td><?= $contx++ ?></td>
            <td>
                <?php foreach(explode(',',$sq['sequencia']) as $sqp): ?>
                <span class="casa-seq"><?= $sqp ?></span>
                <?php endforeach;?>
            </td>
            <td><?= $sq['qtd'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
