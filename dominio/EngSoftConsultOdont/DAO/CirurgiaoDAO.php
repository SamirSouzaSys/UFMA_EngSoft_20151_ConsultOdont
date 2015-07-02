<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'GenericDAO.php';
require_once '../Bean/Cirurgiao.php';

/**
 * Description of CirurgiaoDAO
 *
 * @author Samir Souza <samir.guitar@gmail.com>
 */
class CirurgiaoDAO extends GenericDAO {

    function __construct($tableName, $tableColumns, $camposReferencia) {
        parent::__construct($tableName, $tableColumns, $camposReferencia);
    }

    function bindParamsObjInsert($stmt, $obj) {
//    $stmt->bindParam(':moodle_id', $moodle_id, PDO::PARAM_INT);
//    $stmt->bindParam(':operacao', $operacao, PDO::PARAM_STR);
//    $handle->execute(array(":date"=>date("Y-m-d H:i:s", strtotime($date)), PDO::PARAM_STR));
        $stmt->bindParam(":nomecirurgiao", $obj->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(":cpfcirurgiao", $obj->getCpf(), PDO::PARAM_INT);
        $stmt->bindParam(":dataNasccirurgiao", date("Y-m-d", strtotime($obj->getDataNascimento())), PDO::PARAM_STR);
        $stmt->bindParam(":enderecocirurgiao", $obj->getEndereco(), PDO::PARAM_STR);
        $stmt->bindParam(":contatocirurgiao", $obj->getContato(), PDO::PARAM_INT);
        $stmt->bindParam(":matricirurgiao", $obj->getMatricula(), PDO::PARAM_INT);
        $stmt->bindParam(":senhacirurgiao", $obj->getSenha(), PDO::PARAM_STR);
        $stmt->bindParam(":crocirurgiao", $obj->getCro(), PDO::PARAM_INT);
    }

    function getDadosObjInsert() {
        return " :nomecirurgiao, :cpfcirurgiao, :dataNasccirurgiao, :enderecocirurgiao, :contatocirurgiao, :matricirurgiao, :senhacirurgiao, :crocirurgiao ";
    }

    function getDadosObjSelectById() {
        $a;
    }

//    function montaArrayObjetos($stmt->fetch(PDO::FETCH_ASSOC),$arrayObjects){
    function montaArrayObjetos($stmt, &$arrayObjects) {

//        while($linha =  $stmt->fetch(PDO::FETCH_ASSOC)) {
        foreach ($stmt as $linha) {
            $cirurgiao = new Cirurgiao($linha['nome'], $linha['cpf'], $linha['dataNascimento'], $linha['endereco'], $linha['contato'], $linha['matricula'], $linha['senha'], $linha['cro']);
            $cirurgiao->setId($linha['id']);
            $arrayObjects[] = $cirurgiao;
        }
    }

}
