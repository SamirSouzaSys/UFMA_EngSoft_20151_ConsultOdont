<?php
require_once '../infraGeral/funcoesDiversas.php';
require_once '../Bean/Administrador.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/AdministradorDAO.php';

$nome = $cpf = $dataNascimento = $endereco = $contato = $matricula = $senha = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = test_input($_POST["inputNome"]);
    $cpf = test_input($_POST["inputCPF"]);
    $dataNascimento = test_input($_POST["inputDataNascimento"]);
    $endereco = test_input($_POST["inputEndereco"]);
    $contato = test_input($_POST["inputContato"]);
    $matricula = test_input($_POST["inputMatricula"]);
    $senha = test_input($_POST["inputSenha"]);
}

$adminObj = new Administrador($nome, $cpf, $dataNascimento, $endereco, $contato, $matricula, $senha);

//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

$adminArrayColumns = array(
  "id" => ":idAdmin",
  "nome" => ":nomeAdmin",
  "cpf" => ":cpfAdmin",
  "dataNascimento" => ":dataNascAdmin",
  "endereco" => ":enderecoAdmin",
  "contato" => ":contatoAdmin",
  "matricula" => ":matriAdmin",
  "senha" => ":senhaAdmin",
);
$adminDao = new AdministradorDAO("administrador", $adminArrayColumns, null);

$inserido = $adminDao->DAOInsert($adminObj, $gerenConex);