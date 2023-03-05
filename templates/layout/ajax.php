<?php
/**
 * Для AJAX-загрузки веб-компонентов.
 *
 * Использовать в контроллёре:
 *      $this->viewBuilder()->setLayout('WebComponent.ajax');
 */
?>
<?= $this->fetch('script') ?>
<?= $this->fetch('content') ?>
