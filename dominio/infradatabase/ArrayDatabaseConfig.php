<?php

/**
 * UNA-SUS/UFMA - InfraEstrutura
 * 
 * @author Samir Souza <samir.guitar@gmail.com>
 * @copyright (C) 2015, CTI UNA-SUS/UFMA
 * @version 1.1
 * @link http://www.unasus.ufma.br/jornadatcc/provab2015/
 */

/**
 * Arquivos de configuração do banco de dados
 */
class ArrayDatabaseConfig {

    /**
     * Método que irá retornar as configurações de conexão com o banco de dados
     * Versão simplificada
     * @return Array
     */
    public static function obterDatabaseConfig($databaseConfig) {
        $databaseConfig['production_moodle_2.5']['hostname'] = '200.137.132.66'; //'bdsites.ufma.br';
        $databaseConfig['production_moodle_2.5']['username'] = 'siscti';
        $databaseConfig['production_moodle_2.5']['password'] = 's1sct1@';
        $databaseConfig['production_moodle_2.5']['database'] = 'moodle25';
        $databaseConfig['production_moodle_2.5']['dbdriver'] = '';
        $databaseConfig['production_moodle_2.5']['charset'] = '';
        $databaseConfig['production_moodle_2.5']['salt'] = 'ijmC@<P3VAWwCTSvxYVx;nZFy?';

        $databaseConfig['production_tcc']['hostname'] = '200.137.132.94'; //'bdsites.ufma.br';
        $databaseConfig['production_tcc']['username'] = 'siscti';
        $databaseConfig['production_tcc']['password'] = 's1sct1@2013';
        $databaseConfig['production_tcc']['database'] = 'bd_ambiente_tcc';
        $databaseConfig['production_tcc']['dbdriver'] = '';
        $databaseConfig['production_tcc']['charset'] = '';

        $databaseConfig['test_moodle_2.5']['hostname'] = '172.18.53.57'; //zeus
        $databaseConfig['test_moodle_2.5']['username'] = 'root';
        $databaseConfig['test_moodle_2.5']['password'] = 'lo18sa90';
        $databaseConfig['test_moodle_2.5']['database'] = 'moodle25';
        $databaseConfig['test_moodle_2.5']['dbdriver'] = ''; //pdo_mysql
        $databaseConfig['test_moodle_2.5']['charset'] = '';
        $databaseConfig['test_moodle_2.5']['salt'] = 'ijmC@<P3VAWwCTSvxYVx;nZFy?';

        $databaseConfig['test_tcc']['hostname'] = '172.18.53.57'; //zeus
        $databaseConfig['test_tcc']['username'] = 'root';
        $databaseConfig['test_tcc']['password'] = 'lo18sa90';
        $databaseConfig['test_tcc']['database'] = 'bd_ambiente_tcc';
        $databaseConfig['test_tcc']['dbdriver'] = ''; //pdo_mysql
        $databaseConfig['test_tcc']['charset'] = '';

        return $databaseConfig;
    }

}
