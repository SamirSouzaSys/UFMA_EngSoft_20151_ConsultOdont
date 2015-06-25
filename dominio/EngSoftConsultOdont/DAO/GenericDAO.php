<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenericDAO
 *
 * @author Samir Souza <samir.guitar@gmail.com>
 */
abstract class GenericDAO {

//    nome da tabela referente a classe
    private $tableName;
//    Array com os 'Nome coluna' => Valor para o dataBind
//    private $tableColumns = array("id" => "valor dataBind",);
    private $arrayTableColumns;
//
    private $camposReferencia;
    private $conexaoPDO;

    function __construct($tableName = null, $arrayTableColumns = null, $camposReferencia = null) {
        $this->tableName = $tableName;
        $this->arrayTableColumns = $arrayTableColumns;
        $this->camposReferencia = $camposReferencia;
    }

    function DAOInsert($object, GerenciadorConexao $objConexao) {
        if (!isset($object)) {
            return false;
        }

        try {
            $this->conexaoPDO = $objConexao->abrirConexaoDb('teste');
        } catch (PDOException $exc) {
            throw new PDOException($exc->getMessage());
        }

        //LIsta de colunas da tabela que serão afetadas pela query
        $colunas = '';
        $i = 0;
        foreach ($this->arrayTableColumns as $key => $val) {
            if ($key != 'id') {
                if ($i > 1) {
                    $colunas = $colunas . ', ' . $key;
                } else {//sendo o primeiro elemento
                    $colunas = $key;
                }
            }
            $i++;
        }

        //coleta campos que serão utilizados pelo dataBind na operação atual
        $dados = $this->getDadosObjInsert();

        //executa inserçãoPDO
        $query = "insert into " . $this->tableName . " ( " . $colunas . " ) " . " values ( " . $dados . " )";

        try {
            $stmt = new PDOStatement;
            $stmt = $this->conexaoPDO->prepare($query);

            $this->bindParamsObjInsert($stmt,$object);

            $stmt->execute();
        } catch (PDOException $exc) {
            $objConexao->fecharConexaoDb(null, $this->conexaoPDO);
            throw new PDOException("Ocorreu um erro ao gerar o LOG da Inscrição.");
        }

        $objConexao->fecharConexaoDb(null, $this->conexaoPDO);

        return TRUE;
    }

    private function DAOUpdate($item, GerenciadorConexao $conexao) {
        $a;
    }

    private function DAOSelectAll(GerenciadorConexao $conexao) {
        $a;
    }

    private function DAOSelectColumn($itemColumn, GerenciadorConexao $conexao) {
        $a;
    }

    private function DAODelete($item, GerenciadorConexao $conexao) {
        $a;
    }

    function getTableName() {
        return $this->tableName;
    }

    function getArrayTableColumns() {
        return $this->arrayTableColumns;
    }

    function getCamposReferencia() {
        return $this->camposReferencia;
    }

    function getConexaoPDO() {
        return $this->conexaoPDO;
    }

    function setTableName($tableName) {
        $this->tableName = $tableName;
    }

    function setArrayTableColumns($arrayTableColumns) {
        $this->arrayTableColumns = $arrayTableColumns;
    }

    function setCamposReferencia($camposReferencia) {
        $this->camposReferencia = $camposReferencia;
    }

    function setConexaoPDO($conexaoPDO) {
        $this->conexaoPDO = $conexaoPDO;
    }

    //vai montar a lista de campos necessários para a operação
    abstract function getDadosObjInsert();

//vai montar a lista de campos necessários para a operação
    abstract function bindParamsObjInsert($stmt,$obj);

//vai montar a lista de campos necessários para a operação
    abstract function getDadosObjSelectById();
//    EXEMPLO
//    $stmt->bindParam(':localHorarioJornada', $localHorarioJornada, PDO::PARAM_INT);
//    $stmt->bindParam(':moodle_id', $moodle_id, PDO::PARAM_INT);
//    $stmt->bindParam(':operacao', $operacao, PDO::PARAM_STR);
}
