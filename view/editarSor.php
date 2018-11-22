<html>
<head>
</head>
<body>
<div>
    <form action="valida.php?acao=editado" method="post">
        <input type="hidden" name="id"           value="<?php echo $valores->getId()?>">
        <br>
        <input type="text"   name="nome"         value="<?php echo $valores->getNome()?>"     placeholder="Nome">
        <br>
        <input type="text"   name="sabor"        value="<?php echo $valores->getSabor()?>"    placeholder="Sabor">
        <br>
        <input type="number" name="quantidade"   value="<?php echo $valores->getQuant()?>"    placeholder="Quantidade">
        <br>
        <input type="number" name="validade"     value="<?php echo $valores->getValidade()?>" placeholder="Validade">
        <br>
        <input type="number" name="data_ent"     value="<?php echo $valores->getdataEnt()?>"  placeholder="Data de Entrada">
        <br>
        <input type="number" name="cpf"          value="<?php echo $valores->getCpf()?>"      placeholder="Cpf">
        <br>
        <input type="number" name="cnpj"         value="<?php echo $valores->getCnpj()?>"     placeholder="Cnpj">
        <br>
        <input type="hidden" name="idEdi" value="3">
        <input type="submit" name="editar" value="Editar">
    </form>

</div>
</body>
</html>