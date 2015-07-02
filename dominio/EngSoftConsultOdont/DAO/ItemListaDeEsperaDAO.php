<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'GenericDAO.php';
require_once '../Bean/ItemListaDeEspera.php';

/**
 * Description of ItemListaDeEsperaDAO
 *
 * @author Samir Souza <samir.guitar@gmail.com>
 */
class ItemListaDeEsperaDAO extends GenericDAO {

    function __construct($tableName, $tableColumns, $camposReferencia) {
        parent::__construct($tableName, $tableColumns, $camposReferencia);
    }

    function bindParamsObjInsert($stmt, $obj) {
//    $stmt->bindParam(':moodle_id', $moodle_id, PDO::PARAM_INT);
//    $stmt->bindParam(':operacao', $operacao, PDO::PARAM_STR);
//    $handle->execute(array(":date"=>date("Y-m-d H:i:s", strtotime($date)), PDO::PARAM_STR));
        $stmt->bindParam(":idClienteItemListaDeEspera", $obj->getId_cliente(), PDO::PARAM_INT);
        $stmt->bindParam(":idSecretarioItemListaDeEspera", $obj->getId_secretario(), PDO::PARAM_INT);
        $stmt->bindParam(":data_horaItemListaDeEspera", date("Y-m-d", strtotime($obj->getData_hora())), PDO::PARAM_STR);
        $stmt->bindParam(":atendidoItemListaDeEspera", $obj->getAtendido(), PDO::PARAM_BOOL);
    }

    function getDadosObjInsert() {
        return " :idClienteItemListaDeEspera, :idSecretarioItemListaDeEspera, :data_horaItemListaDeEspera, :atendidoItemListaDeEspera ";
    }

    function getDadosObjSelectById() {
        $a;
    }

//    function montaArrayObjetos($stmt->fetch(PDO::FETCH_ASSOC),$arrayObjects){
    function montaArrayObjetos($stmt, &$arrayObjects) {

//        while($linha =  $stmt->fetch(PDO::FETCH_ASSOC)) {
        foreach ($stmt as $linha) {
            $ItemListaDeEspera = new ItemListaDeEspera($linha['id_cliente'], $linha['id_secretario'], $linha['data_hora'], $linha['atendido']);
            $ItemListaDeEspera->setId($linha['id']);
            $arrayObjects[] = $ItemListaDeEspera;
        }
    }

}
