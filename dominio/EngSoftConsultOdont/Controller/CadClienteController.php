<?php

require_once '../infraGeral/funcoesDiversas.php';
require_once '../Bean/Cliente.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/ClienteDAO.php';

$nome = $cpf = $dataNascimento = $endereco = $contato = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = test_input($_POST["inputNome"]);
    $cpf = test_input($_POST["inputCPF"]);
    $dataNascimento = test_input($_POST["inputDataNascimento"]);
    $endereco = test_input($_POST["inputEndereco"]);
    $contato = test_input($_POST["inputContato"]);
}

$clienteObj = new Cliente($nome, $cpf, $dataNascimento, $endereco, $contato);

//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

$clienteArrayColumns = array(
  "id" => ":idCliente",
  "nome" => ":nomeCliente",
  "cpf" => ":cpfCliente",
  "dataNascimento" => ":dataNascCliente",
  "endereco" => ":enderecoCliente",
  "contato" => ":contatoCliente",
);
$clienteDao = new ClienteDAO("cliente", $clienteArrayColumns, null);

$inserido = $clienteDao->DAOInsert($clienteObj, $gerenConex);

header("location:" . $GLOBALS['url_site'] . "/engsoftconsultodont/pages/cadastrarCliente.php?msgErr=Cliente cadastrado com sucesso!");