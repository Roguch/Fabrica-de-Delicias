<html>
    <head>
    </head>
    <body>
        <div>
            <form action="valida.php?acao=editado" method="post">
                <input type="number"  name="cnpj"         value="<?php echo $valores->getCnpj()?>"     placeholder="Cnpj">
                <input type="text"    name="nome"         value="<?php echo $valores->getNome()?>"     placeholder="Nome">
                <input type="email"   name="email"        value="<?php echo $valores->getEmail()?>"    placeholder="Email">
                <input type="number"  name="telefone"     value="<?php echo $valores->getTelefone()?>" placeholder="Telefone">
                <input type="submit" name="editar" value="Editar">
            </form>


        </div>
    </body>
</html>