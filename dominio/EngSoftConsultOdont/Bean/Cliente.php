<?php



/**
 * Description of Cliente
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class Cliente {

    private $id;
    private $nome;
    private $cpf;
    private $dataNascimento;
    private $endereco;
    private $contato;

    function __construct($nome, $cpf, $dataNascimento, $endereco, $contato) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNascimento = $dataNascimento;
        $this->endereco = $endereco;
        $this->contato = $contato;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getContato() {
        return $this->contato;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setContato($contato) {
        $this->contato = $contato;
    }

}
