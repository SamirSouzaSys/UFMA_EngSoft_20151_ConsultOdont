<?php

require_once '/Funcionario.php';

/**
 * Description of Cirurgiao
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
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
