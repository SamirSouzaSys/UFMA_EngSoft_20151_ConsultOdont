<?php

require_once 'GenericDAO.php';
require_once __DIR__.'/../Bean/Administrador.php';

/**
 * Description of AdministradorDAO
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class AdministradorDAO extends GenericDAO {

    function __construct($tableName, $tableColumns, $camposReferencia) {
        parent::__construct($tableName, $tableColumns, $camposReferencia);
    }

    function bindParamsObjInsert($stmt, $obj) {
        $stmt->bindParam(":nomeAdmin", $obj->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(":cpfAdmin", $obj->getCpf(), PDO::PARAM_INT);
        $stmt->bindParam(":dataNascAdmin", date("Y-m-d", strtotime($obj->getDataNascimento())), PDO::PARAM_STR);
        $stmt->bindParam(":enderecoAdmin", $obj->getEndereco(), PDO::PARAM_STR);
        $stmt->bindParam(":contatoAdmin", $obj->getContato(), PDO::PARAM_INT);
        $stmt->bindParam(":matriAdmin", $obj->getMatricula(), PDO::PARAM_INT);
        $stmt->bindParam(":senhaAdmin", $obj->getSenha(), PDO::PARAM_STR);
    }

    function getDadosObjInsert() {
        return " :nomeAdmin, :cpfAdmin, :dataNascAdmin, :enderecoAdmin, :contatoAdmin, :matriAdmin, :senhaAdmin ";
    }

    function getDadosObjSelectById() {
        $a;
    }

//    function montaArrayObjetos($stmt->fetch(PDO::FETCH_ASSOC),$arrayObjects){
    function montaArrayObjetos($stmt, &$arrayObjects) {
//        while($linha =  $stmt->fetch(PDO::FETCH_ASSOC)) {
        foreach ($stmt as $linha) {
            $administrador = new Administrador($linha['nome'], $linha['cpf'], $linha['dataNascimento'], $linha['endereco'], $linha['contato'], $linha['matricula'], $linha['senha']);
            $administrador->setId($linha['id']);
            $arrayObjects[] = $administrador;
        }
    }

}
