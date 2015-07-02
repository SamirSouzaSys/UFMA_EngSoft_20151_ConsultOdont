<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Procedimento
 *
 * @author Samir Souza <samir.guitar@gmail.com>
 */
class Procedimento {

    private $id;
    private $nome;
    private $descricao;
    private $preco;

    function __construct($nome, $descricao, $preco) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getPreco() {
        return $this->preco;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

}
