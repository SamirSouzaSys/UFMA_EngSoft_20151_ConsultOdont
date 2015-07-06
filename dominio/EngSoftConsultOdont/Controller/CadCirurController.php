<?php
require_once '../infraGeral/funcoesDiversas.php';
require_once '../Bean/Cirurgiao.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/CirurgiaoDAO.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = test_input($_POST["inputNome"]);
    $cpf = test_input($_POST["inputCPF"]);
    $dataNascimento = test_input($_POST["inputDataNascimento"]);
    $endereco = test_input($_POST["inputEndereco"]);
    $contato = test_input($_POST["inputContato"]);
    $matricula = test_input($_POST["inputMatricula"]);
    $matriculaCro = test_input($_POST["inputMatriculaCRO"]);
    $senha = test_input($_POST["inputSenha"]);
}

$cirurObj = new Cirurgiao($nome, $cpf, $dataNascimento, $endereco, $contato, $matricula, $senha, $matriculaCro);

$gerenConex = new GerenciadorConexao();

$cirurArrayColumns = array(
  "id" => ":idAdmin",
  "nome" => ":nomeAdmin",
  "cpf" => ":cpfAdmin",
  "dataNascimento" => ":dataNascAdmin",
  "endereco" => ":enderecoAdmin",
  "contato" => ":contatoAdmin",
  "matricula" => ":matriAdmin",
  "senha" => ":senhaAdmin",
  "cro" => ":crocirurgiao",
);

$cirurDao = new CirurgiaoDAO("cirurgiao", $cirurArrayColumns, null);

$inserido = $cirurDao->DAOInsert($cirurObj, $gerenConex);