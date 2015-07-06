<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListaDeEspera
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class ItemListaDeEspera {

    private $id;
    private $id_cliente;
    private $id_secretario;
    private $data_hora;
    private $atendido;

    function __construct($id_cliente, $id_secretario, $data_hora, $atendido) {
        $this->id_cliente = $id_cliente;
        $this->id_secretario = $id_secretario;
        $this->data_hora = $data_hora;
        $this->atendido = $atendido;
    }

    function getId() {
        return $this->id;
    }

    function getAtendido() {
        return $this->atendido;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAtendido($atendido) {
        $this->atendido = $atendido;
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
