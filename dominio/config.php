<?php

require_once './dominio/infradatabase/GerenciadorConexao.php';
require_once './dominio/Sqls.php';
require_once './dominio/Maps.php';

$db = new GerenciadorConexao();
$sqls = new Sqls();
$maps = new Maps();

$jornadaAtual = 9;
$bancoTCC = "bd_ambiente_tcc";

$conexao = $db->abrirConexaoDb($bancoTCC, 'pdo');
$inforsPolo = $sqls->retornaInformacoesPoloJornadaPDO($jornadaAtual, null, $conexao);
$inforsConfig = $sqls->retornarInformacoesConfig($jornadaAtual, $conexao);
$inforsJornada = $sqls->retornaInformacoesJornada($jornadaAtual, $conexao);
$jornadasAnteriores = $sqls->retornaJornadasAnteriores($inforsJornada[0]['periodoinscricao_inicio'], $conexao);