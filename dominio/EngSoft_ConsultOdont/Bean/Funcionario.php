<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace EngSoft_ConsultOdont\Bean;

/**
 * Description of Funcionario
 *
 * @author Samir Souza <samir.guitar@gmail.com>
 */
abstract class Funcionario {
    private $id;
    private $nome;
    private $cpf;
    private $dataNascimento;
    private $endereco;
    private $contato;
    private $matricula;
    private $senha;
    
    function __construct($nome, $cpf, $dataNascimento, $matricula, $senha) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNascimento = $dataNascimento;
        $this->matricula = $matricula;
        $this->senha = $senha;
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getMatricula() {
        return $this->matricula;
    }

    function getSenha() {
        return $this->senha;
    }

    function setId($id) {
        $this->id = $id;
    }


    
}
