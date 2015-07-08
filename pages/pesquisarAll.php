<?php
ob_start();

require_once '../system.php';
?>
<div class="container text-left box" style="max-width: 350px; min-height: 80px;">
    <ul>
        <li>
            <a href="<?=$url_site?>/pages/pesquisarCliente.php">Pesquisar Cliente</a>
        </li>
    </ul>
</div>
<?php
$pageMainContent = ob_get_contents();
ob_end_clean();
$subtitle = '';
$pageTitle = 'Pesquisar Cliente';

include '../layout/masterLayout.php';
?>
