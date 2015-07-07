<?php


require_once 'GenericDAO.php';
require_once '../Bean/PlanoTratamentoProcedimentos.php';

/**
 * Description of PlanoTratamentoProcedimentosDAO
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class PlanoTratamentoProcedimentosDAO extends GenericDAO {

    function __construct($tableName, $tableColumns, $camposReferencia) {
        parent::__construct($tableName, $tableColumns, $camposReferencia);
    }

    function bindParamsObjInsert($stmt, $obj) {
//    $stmt->bindParam(':moodle_id', $moodle_id, PDO::PARAM_INT);
//    $stmt->bindParam(':operacao', $operacao, PDO::PARAM_STR);
//    $handle->execute(array(":date"=>date("Y-m-d H:i:s", strtotime($date)), PDO::PARAM_STR));
        $stmt->bindParam(":idCirurgiaoPlanoTratamentoProcedimentos", $obj->getId_cirurgiao(), PDO::PARAM_INT);
        $stmt->bindParam(":idClientePlanoTratamentoProcedimentos", $obj->getId_cliente(), PDO::PARAM_INT);
        $stmt->bindParam(":qtdAtendimentoPlanoTratamentoProcedimentos", $obj->getQtdAtendimento(), PDO::PARAM_INT);
    }

    function getDadosObjInsert() {
        return " :idCirurgiaoPlanoTratamentoProcedimentos, :idClientePlanoTratamentoProcedimentos, :qtdAtendimentoPlanoTratamentoProcedimentos";
    }

    function getDadosObjSelectById() {
        $a;
    }

//    function montaArrayObjetos($stmt->fetch(PDO::FETCH_ASSOC),$arrayObjects){
    function montaArrayObjetos($stmt, &$arrayObjects) {

//        while($linha =  $stmt->fetch(PDO::FETCH_ASSOC)) {
        foreach ($stmt as $linha) {
            $PlanoTratamentoProcedimentos = new PlanoTratamentoProcedimentos($linha['id_cirurgiao'], $linha['id_cliente'], $linha['qtdAtendimento']);
            $PlanoTratamentoProcedimentos->setId($linha['id']);
            $arrayObjects[] = $PlanoTratamentoProcedimentos;
        }
    }

}
