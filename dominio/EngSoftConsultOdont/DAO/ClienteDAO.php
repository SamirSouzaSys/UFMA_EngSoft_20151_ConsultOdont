<?php


require_once 'GenericDAO.php';
require_once '../Bean/Cliente.php';

/**
 * Description of ClienteDAO
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class ClienteDAO extends GenericDAO {

    function __construct($tableName, $tableColumns, $camposReferencia) {
        parent::__construct($tableName, $tableColumns, $camposReferencia);
    }

    function bindParamsObjInsert($stmt, $obj) {
//    $stmt->bindParam(':moodle_id', $moodle_id, PDO::PARAM_INT);
//    $stmt->bindParam(':operacao', $operacao, PDO::PARAM_STR);
//    $handle->execute(array(":date"=>date("Y-m-d H:i:s", strtotime($date)), PDO::PARAM_STR));
        $stmt->bindParam(":nomeCliente", $obj->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(":cpfCliente", $obj->getCpf(), PDO::PARAM_INT);
        $stmt->bindParam(":dataNascCliente", date("Y-m-d", strtotime($obj->getDataNascimento())), PDO::PARAM_STR);
        $stmt->bindParam(":enderecoCliente", $obj->getEndereco(), PDO::PARAM_STR);
        $stmt->bindParam(":contatoCliente", $obj->getContato(), PDO::PARAM_INT);
    }

    function getDadosObjInsert() {
        return " :nomeCliente, :cpfCliente, :dataNascCliente, :enderecoCliente, :contatoCliente ";
    }

    function getDadosObjSelectById() {
        $a;
    }

//    function montaArrayObjetos($stmt->fetch(PDO::FETCH_ASSOC),$arrayObjects){
    function montaArrayObjetos($stmt, &$arrayObjects) {

//        while($linha =  $stmt->fetch(PDO::FETCH_ASSOC)) {
        foreach ($stmt as $linha) {
            $cliente = new Cliente($linha['nome'], $linha['cpf'], $linha['dataNascimento'], $linha['endereco'], $linha['contato']);
            $cliente->setId($linha['id']);
            $arrayObjects[] = $cliente;
        }
    }

}
