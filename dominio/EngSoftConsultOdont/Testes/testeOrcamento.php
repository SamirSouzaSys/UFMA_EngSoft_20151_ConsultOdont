<?php

require_once '../Bean/Orcamento.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/OrcamentoDAO.php';
//criar um orcamento

echo "\n\nTESTE ORCAMENTO INICIADO!!\n\n";

$orcamentoObj1 = new Orcamento(1, '5.0', false);
$orcamentoObj2 = new Orcamento(2, '10.5', true);
$orcamentoObj3 = new Orcamento(3, '112.0', false);
$orcamentoObj4 = new Orcamento(4, '50', true);


//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

//criar o daoOrcamento
$orcamento = new OrcamentoDAO(null, null, null);

///Insere orcamento
$orcamento->setTableName("orcamento");

$orcamentoArrayColumns = array(
  "id_planTratProc" => ":id_planoTratProcOrcamento",
  "preco" => ":precoOrcamento",
  "pago" => ":pagoOrcamento",
);
$orcamento->setArrayTableColumns($orcamentoArrayColumns);

//Teste de inserçao
$orcamento->DAOInsert($orcamentoObj1, $gerenConex); //1
$orcamento->DAOInsert($orcamentoObj2, $gerenConex); //1
$orcamento->DAOInsert($orcamentoObj3, $gerenConex); //2
$orcamento->DAOInsert($orcamentoObj4, $gerenConex); //3
//
//Teste selectAll
var_dump($orcamento->DAOSelectAll($gerenConex));

echo "\n\nTESTE ORCAMENTO FINALIZADO!!\n\n";