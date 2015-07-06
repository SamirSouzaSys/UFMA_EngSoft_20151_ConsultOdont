<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Funcionario
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
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

    function __construct($nome, $cpf, $dataNascimento, $endereco, $contato, $matricula, $senha) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNascimento = $dataNascimento;
        $this->endereco = $endereco;
        $this->contato = $contato;
        $this->matricula = $matricula;
        $this->senha = $senha;
    }

    private function getVars() {
        return var_dump(getVars($this));
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

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getContato() {
        return $this->contato;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setContato($contato) {
        $this->contato = $contato;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

}
