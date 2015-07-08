<?php

require_once './EngSoftConsultOdont/infraGeral/funcoesDiversas.php';
require_once './EngSoftConsultOdont/Infradatabase/GerenciadorConexao.php';
require_once __DIR__.'./EngSoftConsultOdont/DAO/CirurgiaoDAO.php';
require_once __DIR__.'./EngSoftConsultOdont/DAO/AdministradorDAO.php';
require_once __DIR__.'./EngSoftConsultOdont/DAO/SecretarioDAO.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = test_input($_POST["inputMatricula"]);
    $senha = test_input($_POST["inputSenha"]);

//criar o Gerenciador de Conexao
    $gerenConex = new GerenciadorConexao();

    if(validarAcesso($matricula, $senha, $gerenConex)){
        header("location:" . $GLOBALS['url_site'] . "/engsoft/index.php");
    };
}

function validarAcesso($matricula, $senha, $conexao) {
    if (empty($matricula) || empty($senha)) {
        header("location:" . $GLOBALS['url_site'] . "/engsoft/pages/login.php?msgErr=Insira o Usuário/Senha. Tente novamente");
    } else {
//Retira as tags php e html da string.
        strip_tags($matricula) && strip_tags($senha);

        $usuarioEncontradoBoolBool = false;
        $funcionarioEncontrado = '';
        $resultPesquisa = '';
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
            $usuarioEncontradoBool = false;
            $resultPesquisa = $adminDao->DAOSelectAll($conexao);
            $funcionarioEncontrado = PesquisaFuncionario($matricula, $senha, $resultPesquisa);
            if ($funcionarioEncontrado != false) {
                $usuarioEncontradoBool = true;
                $tipoFuncionario = 'administrador';
            }

//Secretario
            if ($usuarioEncontradoBool == false) {
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
                    $usuarioEncontradoBool = true;
                    $tipoFuncionario = 'secretario';
                }
            }

//Cirurgiao
            if ($usuarioEncontradoBool == false) {
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
                    $usuarioEncontradoBool = true;
                    $tipoFuncionario = 'cirurgiao';
                }
            }

//Teste Final
            if ($usuarioEncontradoBool == false) {
                header("location:" . $GLOBALS['url_site'] . "/engsoft/pages/login.php?msgErr=Usuário/Senha inválidos... Tente novamente");
            }
        } catch (Exception $exc) {
            /*throw new Exception("Houve um erro ao retornar dados de acesso do usu�rio.<br/>" . $exc->getMessage());*/
            header("location:" . $GLOBALS['url_site'] . "/engsoft/pages/login.php?msgErr=Erro: " . $exc->getMessage() . " Tente novamente");
        }

        if ($funcionarioEncontrado != false) {
            session_start();

            $_SESSION['id'] = $funcionarioEncontrado->getId();
            $_SESSION['nome'] = $funcionarioEncontrado->getNome();
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
            $_SESSION['logado'] = TRUE;

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

    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    unset($_SESSION['cpf']);
    unset($_SESSION['dataNascimento']);
    unset($_SESSION['endereco']);
    unset($_SESSION['contato']);
    unset($_SESSION['matricula']);
    unset($_SESSION['senha']);
    unset($_SESSION['tipo']);
    unset($_SESSION['cro']);
    $_SESSION['logado'] = FALSE;
}

//verificar a validade da sessao
function verificarSessao() {
    session_start();
    if ($_SESSION['logado'] == true) {
        return TRUE;
    }
    logout();
    return FALSE;
}

?>