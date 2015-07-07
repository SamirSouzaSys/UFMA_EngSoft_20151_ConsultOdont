<?php



/**
 * Description of Procedimento
 *
 * @author Allane Régis <allaneregis@gmail.com> @author Elydillse Botelho <elydillse@hotmail.com> @author José Paulo <jose.paulo.95@hotmail.com> @author Samir Souza <samir.guitar@gmail.com>
 */
class Procedimento {

    private $id;
    private $nome;
    private $descricao;
    private $preco;

    function __construct($nome, $descricao, $preco) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getPreco() {
        return $this->preco;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

}
