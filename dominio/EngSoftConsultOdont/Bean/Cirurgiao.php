<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Funcionario.php';

/**
 * Description of Cirurgiao
 *
 * @author Samir Souza <samir.guitar@gmail.com>
 */
class Cirurgiao extends Funcionario {

    private $cro;

    public function __construct($nome, $cpf, $dataNascimento, $endereco, $contato, $matricula, $senha, $cro) {
        parent::__construct($nome, $cpf, $dataNascimento, $endereco, $contato, $matricula, $senha);
        $this->setCro($cro);
    }

    function getCro() {
        return $this->cro;
    }

    function setCro($cro) {
        $this->cro = $cro;
    }

}
