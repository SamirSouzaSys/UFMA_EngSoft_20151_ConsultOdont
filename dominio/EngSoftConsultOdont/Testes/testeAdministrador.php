<?php

require_once '../Bean/Administrador.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/AdministradorDAO.php';
//criar um administrador

$secreObj = new Administrador('nome 1', 00011122233, "2000-12-13", "enderco exemplo", 988777766, 123456789, 123456);

//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

//criar o daoAdministrador
$secreDao = new AdministradorDAO(null, null, null);

///Insere administrador
$secreDao->setTableName("administrador");

$administradorArrayColumns = array(
  "id" => ":idAdmin",
  "nome" => ":nomeAdmin",
  "cpf" => ":cpfAdmin",
  "dataNascimento" => ":dataNascAdmin",
  "endereco" => ":enderecoAdmin",
  "contato" => ":contatoAdmin",
  "matricula" => ":matriAdmin",
  "senha" => ":senhaAdmin",
);
$secreDao->setArrayTableColumns($administradorArrayColumns);

echo "Teste de inserção";
var_dump($secreDao->DAOInsert($secreObj, $gerenConex)); //1
var_dump($secreDao->DAOInsert($secreObj, $gerenConex)); //2
var_dump($secreDao->DAOInsert($secreObj, $gerenConex)); //3
var_dump($secreDao->DAOInsert($secreObj, $gerenConex)); //4


echo "Teste selectAll";
var_dump($secreDao->DAOSelectAll($gerenConex));