<?php



/**
 * Description of Atendimento
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class Atendimento {

    private $id;
    private $id_cliente;
    private $id_cirurgiao;
    private $id_secretario;
    private $data_hora;
    private $id_planoTratProc;

    function __construct($id_cliente, $id_cirurgiao, $id_secretario, $data_hora, $id_planoTratProc) {
        $this->id_cliente = $id_cliente;
        $this->id_cirurgiao = $id_cirurgiao;
        $this->id_secretario = $id_secretario;
        $this->data_hora = $data_hora;
        $this->id_planoTratProc = $id_planoTratProc;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setId_cirurgiao($id_cirurgiao) {
        $this->id_cirurgiao = $id_cirurgiao;
    }

    function setId_secretario($id_secretario) {
        $this->id_secretario = $id_secretario;
    }

    function setData_hora($data_hora) {
        $this->data_hora = $data_hora;
    }

    function setId_planoTratProc($id_planoTratProc) {
        $this->id_planoTratProc = $id_planoTratProc;
    }

    function getId() {
        return $this->id;
    }

    function getId_cliente() {
        return $this->id_cliente;
    }

    function getId_cirurgiao() {
        return $this->id_cirurgiao;
    }

    function getId_secretario() {
        return $this->id_secretario;
    }

    function getData_hora() {
        return $this->data_hora;
    }

    function getId_planoTratProc() {
        return $this->id_planoTratProc;
    }

}
