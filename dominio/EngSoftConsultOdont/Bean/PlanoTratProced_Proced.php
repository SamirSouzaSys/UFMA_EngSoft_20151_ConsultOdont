<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace EngSoft_ConsultOdont\Bean;

/**
 * Description of planoTratProced_Proced
 *
 * @author Samir Souza <samir.guitar@gmail.com>
 */
class PlanoTratProced_Proced {

    private $id;
    private $planoTratamentoProcedimentos_id;
    private $procedimento_id;

    function __construct($planoTratamentoProcedimentos_id, $procedimento_id) {
        $this->planoTratamentoProcedimentos_id = $planoTratamentoProcedimentos_id;
        $this->procedimento_id = $procedimento_id;
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
