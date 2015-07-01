<?php

require_once '../Bean/Secretario.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/SecretarioDAO.php';
//criar um secretario

$secreObj = new Secretario('nome 1', 00011122233, "2000-12-13", "enderco exemplo", 988777766, 123456789, 123456);

//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

//criar o daoSecretario
$secreDao = new SecretarioDAO(null, null, null);

///Insere secretario
$secreDao->setTableName("secretario");

$secretarioArrayColumns = array(
  "id" => ":idSecret",
  "nome" => ":nomeSecret",
  "cpf" => ":cpfSecret",
  "dataNascimento" => ":dataNascSecret",
  "endereco" => ":enderecoSecret",
  "contato" => ":contatoSecret",
  "matricula" => ":matriSecret",
  "senha" => ":senhaSecret",
);
$secreDao->setArrayTableColumns($secretarioArrayColumns);

//Teste de inserçao
//$secreDao->DAOInsert($secreObj, $gerenConex); //1
//$secreDao->DAOInsert($secreObj, $gerenConex); //1
//$secreDao->DAOInsert($secreObj, $gerenConex); //2
//$secreDao->DAOInsert($secreObj, $gerenConex); //3


//Teste selectAll
//var_dump($secreDao->DAOSelectAll($gerenConex));