<?php
ob_start();

require_once '../system.php';
?>
<div class="row">

    <div class="panel panel-default text-left" style=" padding: 15px; margin: 20px auto; max-width: 500px; min-height: 150px;">
        <div class="panel-heading">
            Cadastrar Cliente
        </div>
        <div class="panel-body">
            <form action="<?= $url_site ?>/dominio/EngSoftConsultOdont/Controller/CadClienteController.php" method="post">
                <div class="row ">
                    <label>Nome</label>
                    <input name="inputNome" class="form-control" placeholder="Digite o nome aqui">

                </div>
                <div class="row ">
                    <label>CPF</label>
                    <input name="inputCPF" class="form-control" placeholder="Digite o cpf aqui">

                </div>
                <div class="row ">
                    <label>Data de Nascimento</label>
                    <input name="inputDataNascimento" class="form-control" placeholder="Ano(0000)-mês(00) - dia(00)">

                </div>
                <div class="row ">
                    <label>Endereço</label>
                    <input name="inputEndereco" class="form-control" placeholder="Digite o endereço aqui">

                </div>
                <div class="row ">
                    <label>Contato</label>
                    <input name="inputContato" class="form-control" placeholder="Digite o contato aqui">

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
$pageTitle = 'Cadastrar Cliente';

include '../layout/masterLayout.php';
?>
