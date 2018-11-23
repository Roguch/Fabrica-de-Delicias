 <?php
        require_once "modelos/DBConnection.php";
        require_once "modelos/CrudUsuario.php";
        require_once "modelos/CrudSorvete.php";
        require_once "modelos/CrudFornecedor.php";
        if (isset($_POST['acao'])){
            $acao = $_POST['acao'];
        }elseif (isset($_GET['acao'])){
            $acao = $_GET['acao'];
        }else{
            $acao = 'sair';
        }
        if (isset($_POST['acao2'])) {
            $acao2 = $_POST['acao2'];
        }else{
            $acao2 = 0;
        }
        $crud  = new CrudUsuario();
        $crud2  = new CrudSorvete();
        $crud3  = new CrudFornecedor();
        switch ($acao){
            case 'logar':
                $resutado = $crud->validaUsuario($_POST['login'],$_POST['senha']);
                if ($resutado == null){
                    echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html' </script>";
                    die();
                }elseif($resutado->getTipo_user() == 'gerente'){

                    $funcionarios = $crud->getUsuarios();
                    $sorvetes     = $crud2->getSorvetes();
                    $fornecedores = $crud3->getFornecedores();

                    include "view/gerenteSorvete.php";
                }elseif ($resutado->getTipo_user() == 'funcionario' ){
                    $usuarioAtivo =  $resutado->getCpf();
                    $sorvetes     = $crud2->getSorvetes();
                    $crudSor = new CrudSorvete();
                    include "view/funcionarioSorvete.php";

                }
                break;
            case 'sair':
                header("location:index.html");
                break;
            case 'cad':

                include "view/cadastro.php";
                break;

            case 'home':

                $funcionarios = $crud->getUsuarios();
                $sorvetes     = $crud2->getSorvetes();
                $fornecedores = $crud3->getFornecedores();

                include "view/gerenteSorvete.php";
                break;
            case 'cadastroFun':

                    $funcionario = new Usuario($_POST['cpf'],$_POST['tipo_user'],$_POST['email'],$_POST['name'],$_POST['login'],$_POST['senha'],$_POST['telefone']);
                    $crud->insertUsuario($funcionario);
                    include "view/cadastro.php";
                    break;

            case 'cadastroSor':

                     $cpf = $crud->achaUsuario($_POST['cpf']);
                    $cnpj = $crud3->achaFornecedor($_POST['cnpj']);

                    $sorvete = new Sorvete(null,$_POST['nome'],$_POST['sabor'],$_POST['qtd'],$_POST['validade'],$_POST['data_ent'],$cnpj,$cpf);
                    $crud2->insertSorvete($sorvete);
                    include "view/cadastro.php";
                    break;

            case 'cadastroFor':

                $fornecedore =new Fornecedor($_POST['cnpj'],$_POST['nome'],$_POST['email'],$_POST['telefone']);
                $crud3->insertFornecedor($fornecedore);
                include "view/cadastro.php";
                break;

            case 'retira' :

                $retirar = $_POST['quanti'] - 1;
                if ($retirar < 0 ){
                    echo"<script language='javascript' type='text/javascript'>alert('Não a mais esse sorvete no estoque');</script>";
                    $sorvetes     = $crud2->getSorvetes();
                    $crudSor = new CrudSorvete();
                    include "view/funcionarioSorvete.php";
                }else {
                    $crud2->retiraCaixa($retirar, $_POST['id']);
                    $sorvetes = $crud2->getSorvetes();
                    $crudSor = new CrudSorvete();
                    include "view/funcionarioSorvete.php";
                }
                break;
            case 'deleta':
                if (isset($_POST['cpf'])){
                    $crud->excluirUsuario($_POST['cpf']);
                }elseif (isset($_POST['id'])){
                    $crud2->excluirSorvete($_POST['id']);
                }elseif (isset($_POST['cnpj'])){
                    $crud3->excluirFornecedor($_POST['cnpj']);
                }

                $funcionarios = $crud->getUsuarios();
                $sorvetes     = $crud2->getSorvetes();
                $fornecedores = $crud3->getFornecedores();

                include "view/gerenteSorvete.php";
                break;
            case 'editar':
                if (isset($_POST['cpf'])){
                    $valores = $crud->getUsuario($_POST['cpf']);

                    include "view/editarFun.php";
                }elseif (isset($_POST['id'])){
                    $valores = $crud2->getSorvete($_POST['id']);

                    include "view/editarSor.php";
                }elseif (isset($_POST['cnpj'])){
                    $valores = $crud3->getFornecedor($_POST['cnpj']);

                    include "view/editarFor.php";
                }elseif (isset($_POST['cpfFun'])){
                    $valores = $crud->getUsuario($_POST['cpfFun']);

                    include "view/editaFunFun.php";
                }
                break;
            case 'editado':

                if ($_POST['idEdi'] == 1){
                    if ($_POST['tipo_user'] == 0){
                        $userTip = 0;
                    }else{
                        $userTip = 1;
                    }
                    $upFun = new Usuario($_POST['cpf'],$userTip,$_POST['email'],$_POST['nome'],$_POST['login'],$_POST['senha'],$_POST['telefone']);
                    $crud->atualizaUsuario($upFun,$_POST['cpf']);
                    $funcionarios = $crud->getUsuarios();
                    $sorvetes     = $crud2->getSorvetes();
                    $fornecedores = $crud3->getFornecedores();

                    include "view/gerenteSorvete.php";
                }elseif ($_POST['idEdi'] == 2){

                    $upFor = new Fornecedor($_POST['cnpj'],$_POST['nome'],$_POST['email'],$_POST['telefone']);
                    $crud3->atualizaFornecedor($upFor,$_POST['cnpj']);
                    $funcionarios = $crud->getUsuarios();
                    $sorvetes     = $crud2->getSorvetes();
                    $fornecedores = $crud3->getFornecedores();

                    include "view/gerenteSorvete.php";
                }elseif ($_POST['idEdi'] == 3 ){
                    $upSor = new Sorvete($_POST['id'],$_POST['nome'],$_POST['sabor'],$_POST['quantidade'],$_POST['validade'],$_POST['data_ent'],$_POST['cnpj'],$_POST['cpf']);
                    $crud2->atualizaSorvete($upSor,$_POST['id']);

                    $funcionarios = $crud->getUsuarios();
                    $sorvetes     = $crud2->getSorvetes();
                    $fornecedores = $crud3->getFornecedores();

                    include "view/gerenteSorvete.php";
                }else{

                    $upFun = new Usuario($_POST['cpf'],1,$_POST['email'],$_POST['nome'],$_POST['login'],$_POST['senha'],$_POST['telefone']);
                    $crud->atualizaUsuario($upFun,$_POST['cpf']);
                    $funcionarios = $crud->getUsuarios();
                    $sorvetes     = $crud2->getSorvetes();
                    $fornecedores = $crud3->getFornecedores();

                    include "view/funcionarioSorvete.php";
                }

                break;
        }
?>