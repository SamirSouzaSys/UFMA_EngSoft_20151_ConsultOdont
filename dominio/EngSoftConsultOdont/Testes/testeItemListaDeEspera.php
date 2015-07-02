<?php

require_once '../Bean/ItemListaDeEspera.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/ItemListaDeEsperaDAO.php';
//criar um itemListaDeEspera

$itemListaDeEsperaObj1 = new ItemListaDeEspera(1, 1, "2000-12-13 00:01:00", false);
$itemListaDeEsperaObj2 = new ItemListaDeEspera(1, 1, "2000-12-13 00:02:00", false);
$itemListaDeEsperaObj3 = new ItemListaDeEspera(1, 1, "2000-12-13 00:03:00", false);
$itemListaDeEsperaObj4 = new ItemListaDeEspera(1, 1, "2000-12-13 00:04:00", false);

//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

//criar o daoItemListaDeEspera
$itemListaDeEsperaDao = new ItemListaDeEsperaDAO(null, null, null);

///Insere itemListaDeEspera
$itemListaDeEsperaDao->setTableName("listaDeEspera");

$itemListaDeEsperaArrayColumns = array(
  "id_cliente" => ":idClienteItemListaDeEspera",
  "id_secretario" => ":idSecretarioItemListaDeEspera",
  "data_hora" => ":data_horaItemListaDeEspera",
  "atendido" => ":atendidoItemListaDeEspera",
);
$itemListaDeEsperaDao->setArrayTableColumns($itemListaDeEsperaArrayColumns);

//Teste de inserçao
$itemListaDeEsperaDao->DAOInsert($itemListaDeEsperaObj1, $gerenConex); //1
$itemListaDeEsperaDao->DAOInsert($itemListaDeEsperaObj2, $gerenConex); //1
$itemListaDeEsperaDao->DAOInsert($itemListaDeEsperaObj3, $gerenConex); //2
$itemListaDeEsperaDao->DAOInsert($itemListaDeEsperaObj4, $gerenConex); //3
//Teste selectAll
var_dump($itemListaDeEsperaDao->DAOSelectAll($gerenConex));
