<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListaDeEspera
 *
 * @author Samir Souza <samir.guitar@gmail.com>
 */
class ItemListaDeEspera {

    private $id;
    private $id_cliente;
    private $id_secretario;
    private $data_hora;

    function __construct($id, $id_cliente, $id_secretario, $data_hora) {
        $this->id = $id;
        $this->id_cliente = $id_cliente;
        $this->id_secretario = $id_secretario;
        $this->data_hora = $data_hora;
    }

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getId_secretario() {
        return $this->id_secretario;
    }

    function getData_hora() {
        return $this->data_hora;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setId_secretario($id_secretario) {
        $this->id_secretario = $id_secretario;
    }

    function setData_hora($data_hora) {
        $this->data_hora = $data_hora;
    }

}
