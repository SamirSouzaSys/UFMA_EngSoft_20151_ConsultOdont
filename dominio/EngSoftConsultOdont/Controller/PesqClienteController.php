<?php

require_once '../infraGeral/funcoesDiversas.php';
require_once '../Bean/Cliente.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/ClienteDAO.php';

$cpf = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpfPesq = test_input($_POST["inputCPFPesquisar"]);
}

if($cpfPesq == ''){
    header("location:" . $GLOBALS['url_site'] . "/engsoftconsultodont/pages/pesquisarCliente.php?msgErr=Cliente nao encontrado. Tente novamente");
}

$colunaSelect = 'cpf';

//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

$clienteArrayColumns = array(
  "cpf" => ":cpfCliente",
);
$clienteDao = new ClienteDAO("cliente", $clienteArrayColumns, null);

$cliente = $clienteDao->DAOSelectColumn($cpfPesq, $gerenConex);

$a = count($cliente);

if ($a > 0) {
    header("location:" . $GLOBALS['url_site'] . "/engsoftconsultodont/pages/pesquisarCliente.php?id=" . $cliente[0]->getId() . "&nome=" . $cliente[0]->getNome() . "&cpf=" . $cliente[0]->getCpf() . "&dataNascimento=" . $cliente[0]->getDataNascimento() . "&endereco=" . $cliente[0]->getEndereco() . "&contato=" . $cliente[0]->getContato());
} else {
    header("location:" . $GLOBALS['url_site'] . "/engsoftconsultodont/pages/pesquisarCliente.php?msgErr=Cliente nao encontrado. Tente novamente");
}
