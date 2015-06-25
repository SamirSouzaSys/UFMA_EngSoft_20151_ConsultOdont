<?php

/**
 * UNA-SUS/UFMA - InfraEstrutura
 * 
 * @author Samir Souza <samir.guitar@gmail.com>
 * @copyright (C) 2015, CTI UNA-SUS/UFMA
 * @version 1.1
 * @link http://www.unasus.ufma.br/SigU/SigUUnasusStore/
 */
require_once 'ArrayDatabaseConfig.php';
/**
 * Classe que irá gerenciar a conxão com o banco de dados específico do domínio
 */
class GerenciadorConexao {

    //Configuração de Banco de dados sendo usada atualmente
    private $dbConfigEmUsoTeste = 'teste'; // 'test_moodle_2.5'
    private $dbConfigEmUsoProducao = 'producao'; //'test_tcc' 'production_tcc' 'localSam'

    /* Database - Não precisa alterar */
    private $dbTeste = 'consultOdontEngSoft';
    private $dbProducao = 'consultOdontEngSoft';

    /**
     * Método que gerencia a escolha do tipo de conexão e servidor
     * baseado no:
     * - banco de dados que será usado
     * - tipo de conexão
     * 
     * @param array $arrayConfig
     * @return type
     *  
     * @author Samir Souza <samir.guitar@gmail.com>
     * @copyright (c) 2014, UNA-SUS/UFMA
     */
    public function abrirConexaoDb($db) {
        $arrayConfigsDb = array();
        $arrayConfigsDb = ArrayDatabaseConfig::obterDatabaseConfig($arrayConfigsDb);


        if (strpos($db, 'teste') !== FALSE) {
            $servidor = $arrayConfigsDb[$this->dbConfigEmUsoTeste]['hostname'];
            $usuario = $arrayConfigsDb[$this->dbConfigEmUsoTeste]['username'];
            $senha = $arrayConfigsDb[$this->dbConfigEmUsoTeste]['password'];
            $db = $arrayConfigsDb[$this->dbConfigEmUsoTeste]['database'];
        } elseif (strpos($db, 'producao') !== FALSE) {
            $servidor = $arrayConfigsDb[$this->dbConfigEmUsoProducao]['hostname'];
            $usuario = $arrayConfigsDb[$this->dbConfigEmUsoProducao]['username'];
            $senha = $arrayConfigsDb[$this->dbConfigEmUsoProducao]['password'];
            $db = $arrayConfigsDb[$this->dbConfigEmUsoProducao]['database'];
        }

        //DEFAULT
        try {
            $conexao = new PDO("mysql:host=" . $servidor . ";port=3306;dbname=" . $db, $usuario, $senha);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exc) {
            throw new Exception("Ocorreu um erro ao abrir a conexão com o banco de dados! (PDO)<br/>" . $exc->getMessage());
        }
        return $conexao;
    }

    function fecharConexaoDb($conexao) {
        $conexao = null;
    }

}

?>