<?php
/**
 * CakePHP элемент "webcomp" для генерации веб-компонента.
 */
?>

<?php
    $this->Html->script( 'components' . DS . strtolower($namewebcomp) . DS . strtolower($namewebcomp), [
        'block' => 'script',
        'type' => 'module',
    ]);
?>

<brunov-<?= $name ?><?= $this->Webcomp->addattr( $attr[0] ?? [] ) ?>>
    <?php
        switch ($select) {
            case 'cell':
                echo $this->cell( ucfirst($namewebcomp), isset($cell['settings']) ? [$cell['settings']] : [], isset($cell['cashe']) ? ['cashe' => $cell['cashe']] : [])->render( $cell['view'] ?? 'display' );
                break;
            case 'clear':
                echo '';
                break;
            default:
                echo $this->element( 'components' . DS . strtolower($namewebcomp), isset($element['settings']) ? [$element['settings']] : [], isset($element['cashe']) ? ['cache' => $element['cashe']] : [] );
        }
    ?>
</brunov-<?= $name ?>>
