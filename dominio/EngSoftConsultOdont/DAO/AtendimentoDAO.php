<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'GenericDAO.php';
require_once '../Bean/Atendimento.php';

/**
 * Description of AtendimentoDAO
 *
 * @author Samir Souza <samir.guitar@gmail.com>
 */
class AtendimentoDAO extends GenericDAO {

    function __construct($tableName, $tableColumns, $camposReferencia) {
        parent::__construct($tableName, $tableColumns, $camposReferencia);
    }

    function bindParamsObjInsert($stmt, $obj) {
//    $stmt->bindParam(':moodle_id', $moodle_id, PDO::PARAM_INT);
//    $stmt->bindParam(':operacao', $operacao, PDO::PARAM_STR);
//    $handle->execute(array(":date"=>date("Y-m-d H:i:s", strtotime($date)), PDO::PARAM_STR));
        $stmt->bindParam(":idClienteAtendimento", $obj->getId_cliente(), PDO::PARAM_INT);
        $stmt->bindParam(":idCirurgiaoAtendimento", $obj->getId_cirurgiao(), PDO::PARAM_INT);
        $stmt->bindParam(":idSecretarioAtendimento", $obj->getId_secretario(), PDO::PARAM_INT);
        $stmt->bindParam(":data_horaAtendimento", date("Y-m-d", strtotime($obj->getData_hora())), PDO::PARAM_STR);
        $stmt->bindParam(":id_planoTratProcAtendimento", $obj->getId_planoTratProc(), PDO::PARAM_INT);
    }

    function getDadosObjInsert() {
        return " :idClienteAtendimento, :idCirurgiaoAtendimento, :idSecretarioAtendimento, :data_horaAtendimento, :id_planoTratProcAtendimento ";
    }

    function getDadosObjSelectById() {
        $a;
    }

//    function montaArrayObjetos($stmt->fetch(PDO::FETCH_ASSOC),$arrayObjects){
    function montaArrayObjetos($stmt, &$arrayObjects) {

//        while($linha =  $stmt->fetch(PDO::FETCH_ASSOC)) {
        foreach ($stmt as $linha) {
            $Atendimento = new Atendimento($linha['id_cliente'], $linha['id_cirurgiao'],$linha['id_secretario'], $linha['data_hora'], $linha['id_planoTratProc']);
            $Atendimento->setId($linha['id']);
            $arrayObjects[] = $Atendimento;
        }
    }

}
