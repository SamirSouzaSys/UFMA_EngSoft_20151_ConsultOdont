<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cirurgiao
 *
 * @author Samir Souza <samir.guitar@gmail.com>
 */
class Cirurgiao extends Funcionario{
    private $cro;
    
    function getCro() {
        return $this->cro;
    }
    
}