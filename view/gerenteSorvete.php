<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gerente Pagina</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" href="../style.css">

    <script type="text/javascript">
        $(document).ready(function(){
             $("#conteudos div:nth-child(1)").show();
             $(".abas li:first div").addClass("selected");
             $(".aba").click(function(){
                      $(".aba").removeClass("selected");
                      $(this).addClass("selected");
                      var indice = $(this).parent().index();
                      indice++;
                      $("#conteudos div").hide();
                      $("#conteudos div:nth-child("+indice+")").show();
             });

             $(".aba").hover(
                      function(){$(this).addClass("ativa")},
                  function(){$(this).removeClass("ativa")}
              );
        });
    </script>
    <script language="JavaScript" type="text/javascript">
        function checkDelete(){
            return confirm('Você tem realmete certeza que quer fazer isso');
        }
    </script>
</head>
<body>

    <div class="AbasControli">
        <div id="abas" >
            <ul class="abas" style=" padding-top: 5px;padding-left: 5px;margin-bottom: 0px;">
                <li class="btn btn-primary">
                    <div class="aba">
                        <span>Funcionarios</span>
                    </div>
                </li>
                <li class="btn btn-primary">
                    <div class="aba">
                        <span>Sorvete</span>
                    </div>
                </li>
                <li class="btn btn-primary">
                    <div class="aba">
                        <span>Fornecedor</span>
                    </div>
                </li>
                <input type="button" onclick="window.location='valida.php';" value="sair" id="sair" style="background: #d09d70;">
                <input type="button" onclick="window.location='valida.php?acao=cad';" value="cadastrar" id="cadastro" style="background: #d09d70;">
            </ul>
        </div>

        <div id="conteudos" style="width: 1885px; height: 905px; padding-left: 10px">
        <div class="conteudo" >

            <?php foreach ($funcionarios as $funcionario):?>

                    <tr>
                        <br>
                        <?php echo "Nome:".$funcionario->getNome()." "?>
                        <br>
                        <?php echo "Funcao:".$funcionario->getTipo_user()." "?>
                        <br>
                        <?php echo "Email:".$funcionario->getEmail()." "?>
                        <br>
                        <?php echo "Login:".$funcionario->getLogin()." "?>
                        <br>
                        <?php echo "Telefone:".$funcionario->getTelefone()." "?>
                        <br>
                        <form action="valida.php?acao=editar" method="post">
                            <input type="hidden" value="<?php echo $funcionario->getCpf()?>" name="cpf">
                            <input type="submit" value="Editar" name="editar">
                        </form>
                        <form action="valida.php?acao=deleta" method="post">
                            <input type="hidden" value="<?php echo $funcionario->getCpf()?>" name="cpf">
                            <input type="submit" value="Deletar" name="deleta" onclick="return checkDelete()">
                        </form>
                    </tr>

            <?php endforeach;?>
        </div>
        <div class="conteudo" style="padding-top: 20px">
            <?php foreach ($sorvetes as $sorvete):?>
                <tr>
                    <?php echo "Nome:".$sorvete->getNome()." "?>
                    <br>
                    <?php echo "Sabor:".$sorvete->getSabor()." "?>
                    <br>
                    <?php echo "Quantidade:".$sorvete->getQuant()." "?>
                    <br>
                    <?php echo "Validade:".$sorvete->getValidade()." "?>
                    <br>
                    <?php echo "Data de Entrada:".$sorvete->getdataEnt()." "?>
                    <br>
                    <form action="valida.php?acao=editar" method="post">
                        <input type="hidden" value="<?php echo $sorvete->getId()?>" name="id">
                        <input type="submit" value="Editar" name="editar">
                    </form>
                    <form action="valida.php?acao=deleta" method="post">
                        <input type="hidden" value="<?php echo $sorvete->getId()?>" name="id">
                        <input type="submit" value="Deletar" name="deleta" onclick="return checkDelete()">
                    </form>
                </tr>
        </div>
            <?php endforeach;?>


        <div class="conteudo" style="padding-top: 20px">
            <?php foreach ($fornecedores as $fornecedor):?>
                <tr>
                    <?php echo "Nome:".$fornecedor->getNome()." "?>
                    <br>
                    <?php echo "Telefone:".$fornecedor->getTelefone()." "?>
                    <br>
                    <?php echo "Email:".$fornecedor->getEmail()." "?>
                    <br>
                    <form action="valida.php?acao=editar" method="post">
                        <input type="hidden" value="<?php echo $fornecedor->getCnpj()?>" name="cnpj">
                        <input type="submit" value="Editar" name="editar">
                    </form>
                    <form action="valida.php?acao=deleta" method="post">
                        <input type="hidden" value="<?php echo $fornecedor->getCnpj()?>" name="cnpj">
                        <input type="submit" value="Deletar" name="deleta" onclick="return checkDelete()">
                    </form>
                </tr>
            <?php endforeach;?>
        </div>
    </div>
    </div>



</div>
</body>
</html>
