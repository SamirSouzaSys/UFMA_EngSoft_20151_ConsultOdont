<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Orçamento
 *
 * @author Samir Souza <samir.guitar@gmail.com>
 */
class Orçamento {

    private $id;
    private $id_planoTracProc;
    private $preco;
    private $pago;

    function __construct($id_planoTracProc, $preco, $pago) {
        $this->id_planoTracProc = $id_planoTracProc;
        $this->preco = $preco;
        $this->pago = $pago;
    }

    function getId() {
        return $this->id;
    }

    function getId_planoTracProc() {
        return $this->id_planoTracProc;
    }

    function getPreco() {
        return $this->preco;
    }

    function getPago() {
        return $this->pago;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_planoTracProc($id_planoTracProc) {
        $this->id_planoTracProc = $id_planoTracProc;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setPago($pago) {
        $this->pago = $pago;
    }

}
