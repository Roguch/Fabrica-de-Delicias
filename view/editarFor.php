<html>
    <head>
    </head>
    <body>
        <div>
            <form action="valida.php?acao=editado" method="post">
                <input type="hidden" name="cnpj" value="<?php echo  $valores->getCnpj()?>">
                <br>
                <input type="text"    name="nome"         value="<?php echo $valores->getNome()?>"     placeholder="Nome">
                <br>
                <input type="email"   name="email"        value="<?php echo $valores->getEmail()?>"    placeholder="Email">
                <br>
                <input type="number"  name="telefone"     value="<?php echo $valores->getTelefone()?>" placeholder="Telefone">
                <br>
                <input type="hidden" name="idEdi" value="2">
<input type="submit" name="editar" value="Editar">
</form>


</div>
</body>
</html>