<?php

require_once '../Bean/PlanoTratProced_Proced.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/PlanoTratProced_ProcedDAO.php';
//criar um planoTratProced_Proced

echo "\n\nTESTE PLANO_TRAT_PROCED_PROCED INICIADO!!\n\n";


$planoTratProced_ProcedObj1 = new PlanoTratProced_Proced(1, 1);
$planoTratProced_ProcedObj2 = new PlanoTratProced_Proced(1, 2);
$planoTratProced_ProcedObj3 = new PlanoTratProced_Proced(2, 3);
$planoTratProced_ProcedObj4 = new PlanoTratProced_Proced(2, 4);
$planoTratProced_ProcedObj5 = new PlanoTratProced_Proced(3, 1);
$planoTratProced_ProcedObj6 = new PlanoTratProced_Proced(4, 2);


//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

//criar o daoPlanoTratProced_Proced
$planoTratProced_Proced = new PlanoTratProced_ProcedDAO(null, null, null);

///Insere planoTratProced_Proced
$planoTratProced_Proced->setTableName("planTratProced_Proced");

$planoTratProced_ProcedArrayColumns = array(
  "planoTratamentoProcedimentos_id" => ":idPlanoTratamentoProcedimentosPlanoTratProced_Proced",
  "procedimento_id" => ":idProcedimentoPlanoTratProced_Proced",
);
$planoTratProced_Proced->setArrayTableColumns($planoTratProced_ProcedArrayColumns);

//Teste de inserçao
$planoTratProced_Proced->DAOInsert($planoTratProced_ProcedObj1, $gerenConex); //1
$planoTratProced_Proced->DAOInsert($planoTratProced_ProcedObj2, $gerenConex); //1
$planoTratProced_Proced->DAOInsert($planoTratProced_ProcedObj3, $gerenConex); //2
$planoTratProced_Proced->DAOInsert($planoTratProced_ProcedObj4, $gerenConex); //3
$planoTratProced_Proced->DAOInsert($planoTratProced_ProcedObj5, $gerenConex); //2
$planoTratProced_Proced->DAOInsert($planoTratProced_ProcedObj6, $gerenConex); //3
//Teste selectAll
var_dump($planoTratProced_Proced->DAOSelectAll($gerenConex));

echo "\n\nTESTE PLANO_TRAT_PROCED_PROCED FINALIZADO!!\n\n";