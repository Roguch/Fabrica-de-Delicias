<html>
<head>
</head>
<body>
<div>
    <form action="valida.php?acao=editado" method="post">
        <input type="number"   name="cpf"       placeholder="Cpf"      value="<?php echo $valores->getCpf()?>">
        <input type="text"     name="tipo_user" placeholder="Gerente/Funcionario">
        <input type="text"     name="nome"      placeholder="Nome"     value="<?php echo $valores->getNome()?>">
        <input type="email"    name="email"     placeholder="Email"    value="<?php echo $valores->getEmail()?>">
        <input type="text"     name="login"     placeholder="Login"    value="<?php echo $valores->getLogin()?>">
        <input type="password" name="senha"     placeholder="Nova Senha">
        <input type="number"   name="telefone"  placeholder="Telefone" value="<?php echo $valores->getTelefone()?>">
        <input type="submit" name="editar" value="Editar">
    </form>

</div>
</body>
</html>