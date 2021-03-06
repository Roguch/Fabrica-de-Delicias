<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <title>Title</title>

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
                <select name="tipo_user">
                    <option value="1">Funcionario</option>
                    <option value="0">Gerente</option>
                </select>
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
