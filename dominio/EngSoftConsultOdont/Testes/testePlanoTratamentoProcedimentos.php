<?php

require_once '../Bean/PlanoTratamentoProcedimentos.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/PlanoTratamentoProcedimentosDAO.php';
//criar um planoTratamentoProcedimentos

echo "\n\nTESTE PLANO_TRATAMENTO_PROCEDIMENTOS INICIADO!!\n\n";

$planoTratamentoProcedimentosObj1 = new PlanoTratamentoProcedimentos(1, 1, 2);
$planoTratamentoProcedimentosObj2 = new PlanoTratamentoProcedimentos(2, 2, 3);
$planoTratamentoProcedimentosObj3 = new PlanoTratamentoProcedimentos(3, 3, 4);
$planoTratamentoProcedimentosObj4 = new PlanoTratamentoProcedimentos(4, 4, 5);


//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

//criar o daoPlanoTratamentoProcedimentos
$planoTratamentoProcedimentos = new PlanoTratamentoProcedimentosDAO(null, null, null);

///Insere planoTratamentoProcedimentos
$planoTratamentoProcedimentos->setTableName("planoTratamentoProcedimentos");

$planoTratamentoProcedimentosArrayColumns = array(
  "id_cirurgiao" => ":idCirurgiaoPlanoTratamentoProcedimentos",
  "id_cliente" => ":idClientePlanoTratamentoProcedimentos",
  "qtdAtendimento" => ":qtdAtendimentoPlanoTratamentoProcedimentos",
);
$planoTratamentoProcedimentos->setArrayTableColumns($planoTratamentoProcedimentosArrayColumns);

//Teste de inserçao
$planoTratamentoProcedimentos->DAOInsert($planoTratamentoProcedimentosObj1, $gerenConex); //1
$planoTratamentoProcedimentos->DAOInsert($planoTratamentoProcedimentosObj2, $gerenConex); //1
$planoTratamentoProcedimentos->DAOInsert($planoTratamentoProcedimentosObj3, $gerenConex); //2
$planoTratamentoProcedimentos->DAOInsert($planoTratamentoProcedimentosObj4, $gerenConex); //3
//Teste selectAll
var_dump($planoTratamentoProcedimentos->DAOSelectAll($gerenConex));

echo "\n\nTESTE PLANO_TRATAMENTO_PROCEDIMENTOS FINALIZADO!!\n\n";