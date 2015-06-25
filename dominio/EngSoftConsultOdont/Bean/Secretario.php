<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Funcionario.php';
/**
 * Description of Secretario
 *
 * @author Samir Souza <samir.guitar@gmail.com>
 */
class Secretario extends Funcionario{
    public function __construct($nome, $cpf, $dataNascimento, $endereco, $contato,$matricula, $senha) {
        parent::__construct($nome, $cpf, $dataNascimento, $endereco, $contato,$matricula, $senha);
    }

}
