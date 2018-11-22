<html>
<head>
</head>
<body>
<div>
    <form action="valida.php?acao=editado" method="post">
        <input type="hidden"   name="cpf"       value="<?php echo $valores->getCpf()?>">
        <br>
        <input type="text"     name="nome"      placeholder="Nome"     value="<?php echo $valores->getNome()?>">
        <br>
        <input type="email"    name="email"     placeholder="Email"    value="<?php echo $valores->getEmail()?>">
        <br>
        <input type="text"     name="login"     placeholder="Login"    value="<?php echo $valores->getLogin()?>">
        <br>
        <input type="password" name="senha"     placeholder="Nova Senha" value="<?php echo $valores->getSenha()?>">
        <br>
        <input type="number"   name="telefone"  placeholder="Telefone" value="<?php echo $valores->getTelefone()?>">
        <br>
        <input type="hidden" name="idEdi" value="4">
        <input type="submit" name="editar" value="Editar">
    </form>

</div>
</body>
</html>