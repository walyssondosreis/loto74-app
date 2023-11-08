
        <?php $contx=1; foreach($sequencias as $sq):?>
        <div>
                {{ $contx++ }}
                {{ $sq['sequencia'] }}
                {{ $sq['qtd'] }}
        </div>
        <?php endforeach; ?>

