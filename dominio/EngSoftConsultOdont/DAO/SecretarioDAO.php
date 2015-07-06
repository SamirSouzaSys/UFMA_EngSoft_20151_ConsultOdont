<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'GenericDAO.php';
require_once '../Bean/Secretario.php';

/**
 * Description of SecretarioDAO
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class SecretarioDAO extends GenericDAO {

    function __construct($tableName, $tableColumns, $camposReferencia) {
        parent::__construct($tableName, $tableColumns, $camposReferencia);
    }

    function bindParamsObjInsert($stmt, $obj) {
//    $stmt->bindParam(':moodle_id', $moodle_id, PDO::PARAM_INT);
//    $stmt->bindParam(':operacao', $operacao, PDO::PARAM_STR);
//    $handle->execute(array(":date"=>date("Y-m-d H:i:s", strtotime($date)), PDO::PARAM_STR));
        $stmt->bindParam(":nomeSecret", $obj->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(":cpfSecret", $obj->getCpf(), PDO::PARAM_INT);
        $stmt->bindParam(":dataNascSecret", date("Y-m-d", strtotime($obj->getDataNascimento())), PDO::PARAM_STR);
        $stmt->bindParam(":enderecoSecret", $obj->getEndereco(), PDO::PARAM_STR);
        $stmt->bindParam(":contatoSecret", $obj->getContato(), PDO::PARAM_INT);
        $stmt->bindParam(":matriSecret", $obj->getMatricula(), PDO::PARAM_INT);
        $stmt->bindParam(":senhaSecret", $obj->getSenha(), PDO::PARAM_STR);
    }

    function getDadosObjInsert() {
        return " :nomeSecret, :cpfSecret, :dataNascSecret, :enderecoSecret, :contatoSecret, :matriSecret, :senhaSecret ";
    }

    function getDadosObjSelectById() {
        $a;
    }

//    function montaArrayObjetos($stmt->fetch(PDO::FETCH_ASSOC),$arrayObjects){
    function montaArrayObjetos($stmt, &$arrayObjects) {

//        while($linha =  $stmt->fetch(PDO::FETCH_ASSOC)) {
        foreach ($stmt as $linha) {
            $secretario = new Secretario($linha['nome'], $linha['cpf'], $linha['dataNascimento'], $linha['endereco'], $linha['contato'], $linha['matricula'], $linha['senha']);
            $secretario->setId($linha['id']);
            $arrayObjects[] = $secretario;
        }
    }

}
