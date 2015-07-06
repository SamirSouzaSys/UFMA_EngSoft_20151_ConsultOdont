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
class ListaDeEspera {
    
    private $listaDeEspera;
    
    function __construct(Array $listaDeEspera) {
        $this->listaDeEspera = $listaDeEspera;
    }

    function getListaDeEspera() {
        return $this->listaDeEspera;
    }

    function setListaDeEspera($listaDeEspera) {
        $this->listaDeEspera = $listaDeEspera;
    }



}
