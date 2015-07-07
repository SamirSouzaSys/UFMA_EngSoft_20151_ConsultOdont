<?php


require_once 'GenericDAO.php';
require_once '../Bean/Procedimento.php';

/**
 * Description of ProcedimentoDAO
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class ProcedimentoDAO extends GenericDAO {

    function __construct($tableName, $tableColumns, $camposReferencia) {
        parent::__construct($tableName, $tableColumns, $camposReferencia);
    }

    function bindParamsObjInsert($stmt, $obj) {
//    $stmt->bindParam(':moodle_id', $moodle_id, PDO::PARAM_INT);
//    $stmt->bindParam(':operacao', $operacao, PDO::PARAM_STR);
//    $handle->execute(array(":date"=>date("Y-m-d H:i:s", strtotime($date)), PDO::PARAM_STR));
        $stmt->bindParam(":nomeProced", $obj->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(":descricaoProced", $obj->getDescricao(), PDO::PARAM_INT);
        $stmt->bindParam(":precoProced", $obj->getPreco(), PDO::PARAM_STR);
    }

    function getDadosObjInsert() {
        return " :nomeProced, :descricaoProced, :precoProced ";
    }

    function getDadosObjSelectById() {
        $a;
    }

//    function montaArrayObjetos($stmt->fetch(PDO::FETCH_ASSOC),$arrayObjects){
    function montaArrayObjetos($stmt, &$arrayObjects) {

//        while($linha =  $stmt->fetch(PDO::FETCH_ASSOC)) {
        foreach ($stmt as $linha) {
            $procedimento = new Procedimento($linha['nome'], $linha['descricao'], $linha['preco']);
            $procedimento->setId($linha['id']);
            $arrayObjects[] = $procedimento;
        }
    }

}
