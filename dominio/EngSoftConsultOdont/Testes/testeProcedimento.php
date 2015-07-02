<?php

require_once '../Bean/Procedimento.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/ProcedimentoDAO.php';
//criar um procedimento

$procedObj = new Procedimento('nome 1', 'descricao 1', '12,9');

//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

//criar o daoProcedimento
$procedDao = new ProcedimentoDAO(null, null, null);

///Insere procedimento
$procedDao->setTableName("procedimento");

$procedimentoArrayColumns = array(
  "id" => ":idProced",
  "nome" => ":nomeProced",
  "descricao" => ":descricaoProced",
  "preco" => ":precoProced",
);
$procedDao->setArrayTableColumns($procedimentoArrayColumns);

//Teste de inserçao
$procedDao->DAOInsert($procedObj, $gerenConex); //1
$procedDao->DAOInsert($procedObj, $gerenConex); //1
$procedDao->DAOInsert($procedObj, $gerenConex); //2
$procedDao->DAOInsert($procedObj, $gerenConex); //3

//Teste selectAll
var_dump($procedDao->DAOSelectAll($gerenConex));