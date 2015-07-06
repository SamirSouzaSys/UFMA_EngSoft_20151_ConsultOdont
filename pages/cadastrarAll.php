<?php
ob_start();

require_once '../system.php';
?>
<div class="container text-left box" style="max-width: 350px; min-height: 150px;">
    <ul>
        <li>
            <a href="<?=$url_site?>/pages/cadastrarAdmin.php">Cadastrar Administrador</a>
        </li>
        <li>
            <a href="<?=$url_site?>/pages/cadastrarCirurgiao.php">Cadastrar Cirurgião</a>
        </li>
        <li>
            <a href="<?=$url_site?>/pages/cadastrarSecretario.php">Cadastrar Secretario</a>
        </li>
        <li>
            <a href="<?=$url_site?>/pages/cadastrarCliente.php">Cadastrar Cliente</a>
        </li>
        <li>
            <a href="<?=$url_site?>/pages/cadastrarProcedimento.php">Cadastrar Procedimento</a>
        </li>
        <li>
            <a href="<?=$url_site?>/pages/cadastrarProcedimento.php">Cadastrar Cliente na lista de Espera</a>
        </li>
    </ul>
</div>
<?php
$pageMainContent = ob_get_contents();
ob_end_clean();
$subtitle = '';
$pageTitle = 'Cadastrar Geral';

include '../layout/masterLayout.php';
?>
