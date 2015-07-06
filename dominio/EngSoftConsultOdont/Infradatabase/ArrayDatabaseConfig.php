<?php

/**
 * UNA-SUS/UFMA - InfraEstrutura
 * 
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
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
        $databaseConfig['teste']['hostname'] = 'localhost'; //'bdsites.ufma.br';
        $databaseConfig['teste']['username'] = 'root';
        $databaseConfig['teste']['password'] = 'root';
        $databaseConfig['teste']['database'] = 'consultOdontEngSoft';
        $databaseConfig['teste']['dbdriver'] = '';
        $databaseConfig['teste']['charset'] = '';

        $databaseConfig['producao']['hostname'] = '200.137.132.94'; //'bdsites.ufma.br';
        $databaseConfig['producao']['username'] = 'siscti';
        $databaseConfig['producao']['password'] = 's1sct1@2013';
        $databaseConfig['producao']['database'] = 'bd_ambiente_tcc';
        $databaseConfig['producao']['dbdriver'] = '';
        $databaseConfig['producao']['charset'] = '';

        return $databaseConfig;
    }

}
