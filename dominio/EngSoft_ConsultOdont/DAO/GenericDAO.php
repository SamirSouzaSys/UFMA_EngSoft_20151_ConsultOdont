<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace EngSoft_ConsultOdont\DAO;

use EngSoft_ConsultOdont\Infradatabase\GerenciadorConexao;

/**
 * Description of GenericDAO
 *
 * @author Samir Souza <samir.guitar@gmail.com>
 */
abstract class GenericDAO {

    private $tableName;
    private $tableColumns;
    private $conexaoPDO;

    private function DAOInsert($item, GerenciadorConexao $objConexao) {
        //verifica existencia do item
        //if return true
        //else return false
        
        //verifica validade da conexao if
        //if return true
        $objConexao->abrirConexaoDb('local');
        //else return false
        //for item preenche array
        //executa inserçãoPDO
        $query = "insert into " . $this->tableName .
                "(fk_inscricao, fk_local_horario_jornada, operacao)"
                . "values ("
                . ":moodle_id, :localHorarioJornada, :operacao)";

        try {
            $stmt = new PDOStatement;
            $stmt = $objConexao->prepare($query);

//        for(){
//            
//        }

            $stmt->bindParam(':localHorarioJornada', $localHorarioJornada, PDO::PARAM_INT);
            $stmt->bindParam(':moodle_id', $moodle_id, PDO::PARAM_INT);
            $stmt->bindParam(':operacao', $operacao, PDO::PARAM_STR);

            $stmt->execute();
        } catch (PDOException $exc) {
            $objConexao->fecharConexaoDb(null, $this->conexaoPDO);
        }

        $objConexao->fecharConexaoDb(null, $this->conexaoPDO);
        return TRUE;
    }

    private function DAOUpdate($item, $conexao);

    private function DAOSelectAll($conexao);

    private function DAOSelectColumn($itemColumn, $conexao);

    private function DAODelete($item, $conexao);
}
