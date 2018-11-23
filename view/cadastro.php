<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <title>Title</title>
    <style>
        body{font-family:Calibri, Tahoma, Arial}
        .AbasControli{ width:100%;  height:400px}
        .AbasControli #abas{ width:100%; overflow:hidden; cursor:hand}
        .AbasControli #conteudos{ width:100%; border: solid 1px;overflow:hidden; height:100%; }
        .AbasControli .abas{display:inline;}
        .AbasControli .abas li{float:left}
        .aba{width:110px; height:30px; border:solid 1px; border-radius:5px 5px 0 0;
            text-align:center; padding-top:5px; background: #8a5454
        }
        .ativa{width:110px; height:30px; border:solid 1px; border-radius:5px 5px 0 0;
            text-align:center; padding-top:5px; background: #5a2929;}
        .ativa span, .selected span{color:#fff}
        .AbasControli #conteudos{background: #d09d70
        }
        .AbasControli .conteudo{background: #d09d70; display:none;color:#fff; width: 1885px; height: 925px;}
        .selected{width:110px; height:30px; border:solid 1px; border-radius:5px 5px 0 0;
            text-align:center; padding-top:5px; background: #5a2929
        }
        #sair{background: #d09d70;}
    </style>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
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
</head>
<body>
<div class="AbasControli">
    <div id="abas">
        <ul class="abas">
            <li>
                <div class="aba">
                    <span>Funcionarios</span>
                </div>
            </li>
            <li>
                <div class="aba">
                    <span>Sorvete</span>
                </div>
            </li>
            <li>
                <div class="aba">
                    <span>Fornecedor</span>
                </div>
            </li>
        </ul>

        <input type="button" onclick="window.location='valida.php?acao=home';" value="Home" id="home" style="background: #d09d70;">
    </div>

    <div id="conteudos" style="width: 1885px; height: 905px; padding-left: 10px">
        <div class="conteudo" >
            <form action="valida.php?acao=cadastroFun" method="post">
                <input type="number" name="cpf" placeholder="CPF">
                <br>
                <input type="email" name="email" placeholder="Elmail">
                <br>
                <input type="text" name="name" placeholder="Nome">
                <br>
                <input type="number" name="telefone" placeholder="Telefone">
                <br>
                <input type="text" name="login" placeholder="Login">
                <br>
                <input type="password" name="senha" placeholder="Senha">
                <br>
                <input type="submit" name="cadastro" value="Cadastrar">
            </form>

        </div>
        <div class="conteudo" style="padding-top: 20px">
            <form action="valida.php?acao=cadastroSor" method="post">
                <input type="text" name="nome" placeholder="Nome do Sorvete">
                <br>
                <input type="text" name="sabor" placeholder="Sabor">
                <br>
                <input type="number" name="qtd" placeholder="Quantidade(caixas)">
                <br>
                <input type="number" name="validade" placeholder="Validade(ano)">
                <br>
                <input type="number" name="data_ent" placeholder="Data de entrada(ano)">
                <br>
                <input type="text" name="cpf" placeholder="Login">
                <br>
                <input type="text" name="cnpj" placeholder="Nome da empresa">
                <br>
                <input type="submit" name="cadastro" value="Cadastrar">
            </form>
        </div>
        <div class="conteudo" style="padding-top: 20px">
            <form action="valida.php?acao=cadastroFor" method="post" >
                <input type="number" name="cnpj" placeholder="CNPJ">
                <br>
                <input type="text" name="nome" placeholder="Nome da empresa">
                <br>
                <input type="email" name="email" placeholder="Email">
                <br>
                <input type="number" name="telefone" placeholder="Telefone">
                <br>
                <input type="submit" name="cadastro" value="Cadastrar">
            </form>
        </div>
    </div>



</div>
</body>
</html>
