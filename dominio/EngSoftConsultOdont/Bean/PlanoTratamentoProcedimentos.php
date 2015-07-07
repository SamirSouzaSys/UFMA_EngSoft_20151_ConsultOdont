<?php



/**
 * Description of planoTratamentoProcedimentos
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class PlanoTratamentoProcedimentos {

    private $id;
    private $id_cirurgiao;
    private $id_cliente;
    private $qtdAtendimento;

    function __construct($id_cirurgiao, $id_cliente, $qtdAtendimento) {
        $this->id_cirurgiao = $id_cirurgiao;
        $this->id_cliente = $id_cliente;
        $this->qtdAtendimento = $qtdAtendimento;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getId_cirurgiao() {
        return $this->id_cirurgiao;
    }

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getQtdAtendimento() {
        return $this->qtdAtendimento;
    }

    function setId_cirurgiao($id_cirurgiao) {
        $this->id_cirurgiao = $id_cirurgiao;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setQtdAtendimento($qtdAtendimento) {
        $this->qtdAtendimento = $qtdAtendimento;
    }

}
