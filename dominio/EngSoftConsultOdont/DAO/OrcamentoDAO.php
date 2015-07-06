<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'GenericDAO.php';
require_once '../Bean/Orcamento.php';

/**
 * Description of OrcamentoDAO
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class OrcamentoDAO extends GenericDAO {

    function __construct($tableName, $tableColumns, $camposReferencia) {
        parent::__construct($tableName, $tableColumns, $camposReferencia);
    }

    function bindParamsObjInsert($stmt, $obj) {
//    $stmt->bindParam(':moodle_id', $moodle_id, PDO::PARAM_INT);
//    $stmt->bindParam(':operacao', $operacao, PDO::PARAM_STR);
//    $handle->execute(array(":date"=>date("Y-m-d H:i:s", strtotime($date)), PDO::PARAM_STR));
        $stmt->bindParam(":id_planTraProcOrcamento", $obj->getId_planoTracProc(), PDO::PARAM_INT);
        $stmt->bindParam(":precoOrcamento", $obj->getPreco(), PDO::PARAM_STR);
        $stmt->bindParam(":pagoOrcamento", $obj->getPago(), PDO::PARAM_BOOL);
    }

    function getDadosObjInsert() {
        return " :id_planTraProcOrcamento, :precoOrcamento, :pagoOrcamento ";
    }

    function getDadosObjSelectById() {
        $a;
    }

//    function montaArrayObjetos($stmt->fetch(PDO::FETCH_ASSOC),$arrayObjects){
    function montaArrayObjetos($stmt, &$arrayObjects) {

//        while($linha =  $stmt->fetch(PDO::FETCH_ASSOC)) {
        foreach ($stmt as $linha) {
            $orcamento = new Orcamento($linha['id_planTratProc'], $linha['preco'], $linha['pago']);
            $orcamento->setId($linha['id']);
            $arrayObjects[] = $orcamento;
        }
    }

}
