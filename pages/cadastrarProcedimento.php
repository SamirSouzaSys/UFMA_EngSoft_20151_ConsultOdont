<?php
ob_start();

require_once '../system.php';
?>
<div class="row">

    <div class="panel panel-default text-left" style=" padding: 15px; margin: 20px auto; max-width: 500px; min-height: 150px;">
        <div class="panel-heading">
            Cadastrar Procedimento
        </div>
        <div class="panel-body">
            <form action="<?= $url_site ?>/dominio/EngSoftConsultOdont/Controller/CadProcedimentoController.php" method="post">
                <div class="row ">
                    <label>Nome</label>
                    <input name="inputNome" class="form-control" placeholder="Digite o nome aqui">

                </div>
                <div class="row ">
                    <label>Descrição</label>
                    <textarea name="inputDescricao" class="form-control" rows="3" placeholder="Digite a Descricao aqui"></textarea>

                </div>
                <div class="row ">
                    <label>Preço</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon">$</span>
                        <input name="inputPreco" type="text" class="form-control">
                        <span class="input-group-addon">.00</span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <button name="btnCadastrar" type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

</div>
<?php
$pageMainContent = ob_get_contents();
ob_end_clean();
$subtitle = '';
$pageTitle = 'Cadastrar Procedimento';

include '../layout/masterLayout.php';
?>
