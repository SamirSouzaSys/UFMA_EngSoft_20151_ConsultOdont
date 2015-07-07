<?php

require_once '../Bean/Cirurgiao.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/CirurgiaoDAO.php';
//criar um cirurgiao

echo "\n\nTESTE CIRURGIÃO INICIADO!!\n\n";

$cirurgiaoObj = new Cirurgiao('nome 1', 00011122233, "2000-12-13", "enderco exemplo", 988777766, 123456789, 123456, 987654);

//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

//criar o daoCirurgiao
$cirurgiaoDao = new CirurgiaoDAO(null, null, null);

///Insere cirurgiao
$cirurgiaoDao->setTableName("cirurgiao");

$cirurgiaoArrayColumns = array(
  "id" => ":idcirurgiao",
  "nome" => ":nomecirurgiao",
  "cpf" => ":cpfcirurgiao",
  "dataNascimento" => ":dataNasccirurgiao",
  "endereco" => ":enderecocirurgiao",
  "contato" => ":contatocirurgiao",
  "matricula" => ":matricirurgiao",
  "senha" => ":senhacirurgiao",
  "cro" => ":crocirurgiao",
);
$cirurgiaoDao->setArrayTableColumns($cirurgiaoArrayColumns);

//Teste de inserçao
$cirurgiaoDao->DAOInsert($cirurgiaoObj, $gerenConex); //1
$cirurgiaoDao->DAOInsert($cirurgiaoObj, $gerenConex); //1
$cirurgiaoDao->DAOInsert($cirurgiaoObj, $gerenConex); //2
$cirurgiaoDao->DAOInsert($cirurgiaoObj, $gerenConex); //3
//Teste selectAll
var_dump($cirurgiaoDao->DAOSelectAll($gerenConex));

echo "\n\nTESTE CIRURGIAO FINALIZADO!!\n\n";