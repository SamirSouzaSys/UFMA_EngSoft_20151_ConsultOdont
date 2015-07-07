<?php



/**
 * Description of Orçamento
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class Orcamento {

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
