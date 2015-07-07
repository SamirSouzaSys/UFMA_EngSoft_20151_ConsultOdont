<?php



/**
 * Description of planoTratProced_Proced
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class PlanoTratProced_Proced {

    private $id;
    private $planoTratamentoProcedimentos_id;
    private $procedimento_id;

    function __construct($planoTratamentoProcedimentos_id, $procedimento_id) {
        $this->planoTratamentoProcedimentos_id = $planoTratamentoProcedimentos_id;
        $this->procedimento_id = $procedimento_id;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getPlanoTratamentoProcedimentos_id() {
        return $this->planoTratamentoProcedimentos_id;
    }

    function getProcedimento_id() {
        return $this->procedimento_id;
    }

    function setPlanoTratamentoProcedimentos_id($planoTratamentoProcedimentos_id) {
        $this->planoTratamentoProcedimentos_id = $planoTratamentoProcedimentos_id;
    }

    function setProcedimento_id($procedimento_id) {
        $this->procedimento_id = $procedimento_id;
    }

}
