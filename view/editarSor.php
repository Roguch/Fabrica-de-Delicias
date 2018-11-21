<html>
<head>
</head>
<body>
<div>
    <form action="valida.php?acao=editado" method="post">
        <input type="text" name="nome"         value="<?php echo $valores->getNome()?>"     placeholder="Nome">
        <input type="text" name="sabor"        value="<?php echo $valores->getSabor()?>"    placeholder="Sabor">
        <input type="number" name="quantidade" value="<?php echo $valores->getQuant()?>"    placeholder="Quantidade">
        <input type="number" name="validade"   value="<?php echo $valores->getValidade()?>" placeholder="Validade">
        <input type="number" name="data_ent"   value="<?php echo $valores->getdataEnt()?>"  placeholder="Data de Entrada">
        <input type="text" name="" value="" placeholder="">
        <input type="text" name="" value="" placeholder="">
        <input type="submit" name="editar" value="Editar">
    </form>

</div>
</body>
</html>