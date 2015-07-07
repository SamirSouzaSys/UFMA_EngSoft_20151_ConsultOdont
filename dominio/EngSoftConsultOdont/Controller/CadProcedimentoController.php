<?php

require_once '../infraGeral/funcoesDiversas.php';
require_once '../Bean/Procedimento.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/ProcedimentoDAO.php';

$nome = $descricao = $preco = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = test_input($_POST["inputNome"]);
    $descricao = test_input($_POST["inputDescricao"]);
    $preco = test_input($_POST["inputPreco"]);
}

$procedimentoObj = new Procedimento($nome, $descricao, $preco);

//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

$procedimentoArrayColumns = array(
  "id" => ":idProced",
  "nome" => ":nomeProced",
  "descricao" => ":descricaoProced",
  "preco" => ":precoProced",
);

$procedimentoDao = new ProcedimentoDAO("procedimento", $procedimentoArrayColumns, null);

$inserido = $procedimentoDao->DAOInsert($procedimentoObj, $gerenConex);
