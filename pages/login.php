<?php
ob_start();

require_once '../system.php';
require_once '../dominio/acesso.php';

if (!verificarSessao()) {
    ?>
    <div class="row">
        <div class="panel panel-default text-left" style=" padding: 15px; margin: 20px auto; max-width: 500px; min-height: 150px;">
            <div class="panel-heading">
                Login
            </div>
            <div class="panel-body">
                <form action="<?= $url_site ?>/dominio/acesso.php" method="post">
                    <div class="row ">
                        <label>Matrícula</label>
                        <input name="inputMatricula" class="form-control" placeholder="Digite a sua MATRÍCULA aqui">
                    </div>
                    <div class="row ">
                        <label>Senha</label>
                        <input name="inputSenha" class="form-control" type="password" placeholder="Digite a sua SENHA aqui"/>
                    </div>
                    <br>
                    <div class="row text-right">
                        <button name="btnLogin" type="submit" class="btn btn-success">Ok!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
} else {
    header("location:" . $GLOBALS['url_site'] . "/index.php");
}

$pageMainContent = ob_get_contents();
ob_end_clean();
$subtitle = '';
$pageTitle = 'Login';

include '../layout/masterLayout.php';
?>
