<?php

require_once '../Bean/Atendimento.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/AtendimentoDAO.php';
//criar um atendimento

echo "\n\nTESTE ATENDIMENTO INICIADO!!\n\n";

$atendimentoObj1 = new Atendimento(1, 1, 1, "2000-12-13 00:01:00", null);
$atendimentoObj2 = new Atendimento(2, 2, 2, "2000-12-13 00:01:00", null);
$atendimentoObj3 = new Atendimento(3, 3, 3, "2000-12-13 00:01:00", null);
$atendimentoObj4 = new Atendimento(4, 4, 4, "2000-12-13 00:01:00", null);


//criar o Gerenciador de Conexao
$gerenConex = new GerenciadorConexao();

//criar o daoAtendimento
$atendimento = new AtendimentoDAO(null, null, null);

///Insere atendimento
$atendimento->setTableName("atendimento");

$atendimentoArrayColumns = array(
  "id_cliente" => ":idClienteAtendimento",
  "id_cirurgiao" => ":idCirurgiaoAtendimento",
  "id_secretario" => ":idSecretarioAtendimento",
  "data_hora" => ":data_horaAtendimento",
  "id_planoTratProc" => ":id_planoTratProcAtendimento",
);
$atendimento->setArrayTableColumns($atendimentoArrayColumns);

//Teste de inserçao
$atendimento->DAOInsert($atendimentoObj1, $gerenConex); //1
$atendimento->DAOInsert($atendimentoObj2, $gerenConex); //1
$atendimento->DAOInsert($atendimentoObj3, $gerenConex); //2
$atendimento->DAOInsert($atendimentoObj4, $gerenConex); //3
//Teste selectAll
var_dump($atendimento->DAOSelectAll($gerenConex));

echo "\n\nTESTE ATENDIMENTO FINALIZADO!!\n\n";