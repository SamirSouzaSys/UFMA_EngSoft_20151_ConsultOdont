<?php

require_once '../../../system.php';
require_once './funcoesDiversas.php';
require_once '../Infradatabase/GerenciadorConexao.php';
require_once '../DAO/AdministradorDAO.php';
require_once '../DAO/CirurgiaoDAO.php';
require_once '../DAO/SecretarioDAO.php';

/**
  UNA-SUS/UFMA - Jornada de TCC *
  @copyright (c) 2014, UNA-SUS/UFMA
 * Regras de negocio para acesso ao sistema
 * Dependencias:
 *              constantes.php
 *              conecta_dbm.php
 * 
  @author Dilson Jos� <dilsonjlrjr@gmail.com>
  @category UNA-SUS/UFMA
  @since Arquivo dispon�vel desde a vers�o 1.0
  @version $1.1$
  @link: http://sistemas.unasus.ufma.br/jornadatcc/jornadatcc_idoso/negocio/acesso.php
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = test_input($_POST["inputMatricula"]);
    $senha = test_input($_POST["inputSenha"]);

    //criar o Gerenciador de Conexao
    $gerenConex = new GerenciadorConexao();

    validarAcesso($matricula, $senha, $gerenConex);
}

function validarAcesso($matricula, $senha, $conexao) {
    if (empty($matricula) || empty($senha)) {
        $_GET['msgErr'] = 'Usuário/Senha inválidos... Tente novamente';
        header("location:" . $url_site);
    } else {
        //Retira as tags php e html da string.
        strip_tags($matricula) && strip_tags($senha);

        $usuarioEncontradoBool = false;
        $funcionarioEncontrado = '';
        $tipoFuncionario = '';
        try {
            //Pesquisa por tipos de usuários
            //Administrador
            $administradorArrayColumns = array(
              "id" => ":idAdmin", "nome" => ":nomeAdmin", "cpf" => ":cpfAdmin",
              "dataNascimento" => ":dataNascAdmin", "endereco" => ":enderecoAdmin",
              "contato" => ":contatoAdmin", "matricula" => ":matriAdmin", "senha" => ":senhaAdmin",
            );
            $adminDao = new AdministradorDAO("administrador", $administradorArrayColumns, null);
            $resultPesquisa = '';
            $resultPesquisa = $adminDao->DAOSelectAll($conexao);
            $funcionarioEncontrado = PesquisaFuncionario($matricula, $senha, $resultPesquisa);
            if ($funcionarioEncontrado != false) {
                $usuarioEncontrado = true;
                $tipoFuncionario = 'administrador';
            }

            //Secretario
            if ($usuarioEncontrado == false) {
                $secretarioArrayColumns = array(
                  "id" => ":idSecret", "nome" => ":nomeSecret", "cpf" => ":cpfSecret",
                  "dataNascimento" => ":dataNascSecret", "endereco" => ":enderecoSecret",
                  "contato" => ":contatoSecret", "matricula" => ":matriSecret", "senha" => ":senhaSecret",
                );
                $secretDao = new SecretarioDAO("secretario", $secretarioArrayColumns, null);
                $resultPesquisa = '';
                $resultPesquisa = $secretDao->DAOSelectAll($conexao);
                $funcionarioEncontrado = PesquisaFuncionario($matricula, $senha, $resultPesquisa);
                if ($funcionarioEncontrado != false) {
                    $usuarioEncontrado = true;
                    $tipoFuncionario = 'secretario';
                }
            }

            //Cirurgiao
            if ($usuarioEncontrado == false) {
                $cirurgiaoArrayColumns = array(
                  "id" => ":idcirurgiao", "nome" => ":nomecirurgiao", "cpf" => ":cpfcirurgiao",
                  "dataNascimento" => ":dataNasccirurgiao", "endereco" => ":enderecocirurgiao",
                  "contato" => ":contatocirurgiao", "matricula" => ":matricirurgiao",
                  "senha" => ":senhacirurgiao", "cro" => ":crocirurgiao",
                );
                $cirurDao = new CirurgiaoDAO("secretario", $cirurgiaoArrayColumns, null);
                $resultPesquisa = '';
                $resultPesquisa = $cirurDao->DAOSelectAll($conexao);
                $funcionarioEncontrado = PesquisaFuncionario($matricula, $senha, $resultPesquisa);
                if ($funcionarioEncontrado != false) {
                    $usuarioEncontrado = true;
                    $tipoFuncionario = 'cirurgiao';
                }
            }

            //Teste Final
            if ($usuarioEncontrado == false) {
                $_GET['msgErr'] = 'Usuário/Senha inválidos... Tente novamente';
                header("location:" . $url_site);
            }
        } catch (Exception $exc) {
            throw new Exception("Houve um erro ao retornar dados de acesso do usu�rio.<br/>" . $exc->getMessage());
            $_GET['msgErr'] = $exc->getMessage() . '... Tente novamente';
            header("location:" . $url_site);
        }

        if ($funcionarioEncontrado != null) {
            session_start();

            $_SESSION['id'] = $funcionarioEncontrado->getId();
            $_SESSION['cpf'] = $funcionarioEncontrado->getCpf();
            $_SESSION['dataNascimento'] = $funcionarioEncontrado->getDataNascimento();
            $_SESSION['endereco'] = $funcionarioEncontrado->getEndereco();
            $_SESSION['contato'] = $funcionarioEncontrado->getContato();
            $_SESSION['matricula'] = $funcionarioEncontrado->getMatricula();
            $_SESSION['senha'] = $funcionarioEncontrado->getSenha();
            $_SESSION['tipo'] = $tipoFuncionario;
            if ($_SESSION['tipo'] == 'cirurgiao') {
                $_SESSION['cro'] = $funcionarioEncontrado->getCro();
            }

            return true;
        } else {

            return false;
        }
    }
}

function PesquisaFuncionario($matriculaPesquisada, $senha, $resultPesquisaGeral) {
    foreach ($resultPesquisaGeral as $funcionario) {
        if ($funcionario->getMatricula() == $matriculaPesquisada && $funcionario->getSenha() == $senha) {
            return $funcionario;
        }
    }
    return false;
}

function logout() {
    session_start();

    unset($_SESSION['autenticacao']);
    unset($_SESSION['id']);
    unset($_SESSION['nome_jtcc1']);
    unset($_SESSION['username_jtcc1']);
    unset($_SESSION['password_jtcc1']);
    unset($_SESSION['tipoparticipante_jtcc1']);
    unset($_SESSION['tipoacesso_jtcc1']);
}

//verificar a validade da sess�o
function verificarSessao() {
    session_start();
    if (!(isset($_SESSION['autenticacao']) && isset($_SESSION['id']) && isset($_SESSION['nome_jtcc1']) &&
            isset($_SESSION['username_jtcc1']) && isset($_SESSION['password_jtcc1']) &&
            isset($_SESSION['tipoparticipante_jtcc1']) && isset($_SESSION['tipoacesso_jtcc1']))
    ) {
        logout();
        return FALSE;
    }

    return TRUE;
}

?>