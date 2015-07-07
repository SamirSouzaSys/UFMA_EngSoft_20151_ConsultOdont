<?php


require_once 'GenericDAO.php';
require_once '../Bean/PlanoTratProced_Proced.php';

/**
 * Description of PlanoTratProced_ProcedDAO
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class PlanoTratProced_ProcedDAO extends GenericDAO {

    function __construct($tableName, $tableColumns, $camposReferencia) {
        parent::__construct($tableName, $tableColumns, $camposReferencia);
    }

    function bindParamsObjInsert($stmt, $obj) {
//    $stmt->bindParam(':moodle_id', $moodle_id, PDO::PARAM_INT);
//    $stmt->bindParam(':operacao', $operacao, PDO::PARAM_STR);
//    $handle->execute(array(":date"=>date("Y-m-d H:i:s", strtotime($date)), PDO::PARAM_STR));
        $stmt->bindParam(":idPlanoTratamentoProcedimentosPlanoTratProced_Proced", $obj->getPlanoTratamentoProcedimentos_id(), PDO::PARAM_INT);
        $stmt->bindParam(":idProcedimentoPlanoTratProced_Proced", $obj->getProcedimento_id(), PDO::PARAM_INT);
    }

    function getDadosObjInsert() {
        return " :idPlanoTratamentoProcedimentosPlanoTratProced_Proced, :idProcedimentoPlanoTratProced_Proced ";
    }

    function getDadosObjSelectById() {
        $a;
    }

//    function montaArrayObjetos($stmt->fetch(PDO::FETCH_ASSOC),$arrayObjects){
    function montaArrayObjetos($stmt, &$arrayObjects) {

//        while($linha =  $stmt->fetch(PDO::FETCH_ASSOC)) {
        foreach ($stmt as $linha) {
            $PlanoTratProced_Proced = new PlanoTratProced_Proced($linha['planoTratamentoProcedimentos_id'], $linha['procedimento_id']);
            $PlanoTratProced_Proced->setId($linha['id']);
            $arrayObjects[] = $PlanoTratProced_Proced;
        }
    }

}
