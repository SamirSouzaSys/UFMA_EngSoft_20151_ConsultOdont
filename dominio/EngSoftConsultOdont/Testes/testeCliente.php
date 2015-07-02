<?php

require_once '../Bean/Cliente.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/ClienteDAO.php';
//criar um cliente

$clienteObj = new Cliente('nome 1', 00011122233, "2000-12-13", "enderco exemplo", 988777766);

//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

//criar o daoCliente
$clienteDao = new ClienteDAO(null, null, null);

///Insere cliente
$clienteDao->setTableName("cliente");

$clienteArrayColumns = array(
  "id" => ":idSecret",
  "nome" => ":nomeSecret",
  "cpf" => ":cpfSecret",
  "dataNascimento" => ":dataNascSecret",
  "endereco" => ":enderecoSecret",
  "contato" => ":contatoSecret",
);
$clienteDao->setArrayTableColumns($clienteArrayColumns);

//Teste de inserçao
$clienteDao->DAOInsert($clienteObj, $gerenConex); //1
$clienteDao->DAOInsert($clienteObj, $gerenConex); //1
$clienteDao->DAOInsert($clienteObj, $gerenConex); //2
$clienteDao->DAOInsert($clienteObj, $gerenConex); //3

//Teste selectAll
var_dump($clienteDao->DAOSelectAll($gerenConex));