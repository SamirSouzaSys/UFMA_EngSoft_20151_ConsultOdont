<?php
ob_start();

require_once '../system.php';

$id = $nome = $cpf = $data = $endereco = $contato = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $data = $_GET['dataNascimento'];
    $endereco = $_GET['endereco'];
    $contato = $_GET['contato'];
}

?>
<div class="row">

    <div class="panel panel-default text-left" style=" padding: 15px; margin: 20px auto; max-width: 500px; min-height: 150px;">
        <div class="panel-heading">
            Pesquisar Cliente
        </div>
        <div class="panel-body">
            <form action="<?= $url_site ?>/dominio/EngSoftConsultOdont/Controller/PesqClienteController.php" method="post">
                <div class="row text-right">
                    <!--<label>CPF</label>-->
                    <input name="inputCPFPesquisar" class="form-control" placeholder="Digite o cpf para pesquisar aqui">
                    <button name="btnCadastrar" type="submit" class="btn btn-success">Pesquisar Cliente</button>
                </div>
                <hr />
                <div class="row ">
                    <label hidden="true">id</label>
                    <input value="<?php echo $id; ?>" style="display:none" name="inputId" class="form-control">
                </div>
                <div class="row ">
                    <label>Nome</label>
                    <input value="<?php echo $nome; ?>" name="inputNome" class="form-control" placeholder="Digite o nome aqui">

                </div>
                <div class="row ">
                    <label>CPF</label>
                    <input value="inputCPF" text="<?php echo $cpf; ?>" class="form-control" placeholder="Digite o cpf aqui">

                </div>
                <div class="row ">
                    <label>Data de Nascimento</label>
                    <input value="inputDataNascimento" text="<?php echo $data; ?>" class="form-control" placeholder="Ano(0000)-mês(00) - dia(00)">

                </div>
                <div class="row ">
                    <label>Endereço</label>
                    <input value="inputEndereco" class="form-control" text="<?php echo $endereco; ?>" placeholder="Digite o endereço aqui">

                </div>
                <div class="row ">
                    <label>Contato</label>
                    <input value="inputContato" text="<?php echo $contato; ?>" class="form-control" placeholder="Digite o contato aqui">

                </div>
                <br>
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
