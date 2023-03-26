<header>
    <h3>Contatos</h3>
</header>

<div>
    <a href="index.php?menuop=cad-contato">Novo Contato</a>
</div>

<div>
    <form action="index.php?menuop=contatos" method="post">
        <input type="text" name="txt_pesquisa">
        <input type="submit" value="Pesquisar">
    </form>
</div>
<!--Contato Ficticio-->
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Sexo</th>
            <th>Data de Nasc</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>

    <?php

        $quantidade = 10;
        $pages = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;
        $inicio = ($quantidade * $pages) - $quantidade;


        $txt_pesquisa = (isset($_POST["txt_pesquisa"]))?$_POST["txt_pesquisa"]:"";

        $sql = "SELECT
        idContato,
        upper(nomeContato) AS nomeContato,
        lower(emailContato) AS emailContato,
        telefoneContato,
        upper(enderecoContato) AS enderecoContato,
        CASE
            WHEN sexoContato='F' THEN 'FEMININO'
            WHEN sexoContato='M' THEN 'MASCULINO'
        ELSE
            'NÃO ESPECIFICADO'
        END AS sexoContato,
        DATE_FORMAT(dataNascContato, '%d/%m/%Y') AS dataNascContato
        FROM dbcontatos 
        WHERE 
        idContato='{$txt_pesquisa}' or
        nomeContato LIKE '%{$txt_pesquisa}%'
        ORDER BY nomeContato ASC
        LIMIT $inicio , $quantidade
        ";
        $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
        
        while($dados = mysqli_fetch_assoc($rs) ){

    
    ?>
        <tr>
            <td><?=$dados["idContato"] ?></td>
            <td><?=$dados["nomeContato"] ?></td>
            <td><?=$dados["emailContato"] ?></td>
            <td><?=$dados["telefoneContato"] ?></td>
            <td><?=$dados["enderecoContato"] ?></td>
            <td><?=$dados["sexoContato"] ?></td>
            <td><?=$dados["dataNascContato"] ?></td>
            <td><a href="index.php?menuop=editar-contato&idContato=<?=$dados["idContato"]?>">Editar</a></td>
            <td><a href="index.php?menuop=excluir-contato&idContato=<?=$dados["idContato"]?>">Excluir</a></td>
        </tr>

    <?php
        }
    ?>
    </tbody>
</table>
<br>
<?php

$sqlTotal = "SELECT idContato FROM dbcontatos";
$qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
$numTotal = mysqli_num_rows($qrTotal);
$totalPagina = ceil($numTotal/$quantidade);
echo "Total de Registros: $numTotal <br>";
echo '<a href="?menuop=contatos&pagina=1">Primeira Página</a>';

for($i = 1; $i <= $totalPagina; $i++){
   
    if($i==$pages){
        echo $i;
    }else{
        echo "<a href=\"?menuop=contatos&pagina=$i\">$i </a>";
    }
}
echo "<a href=\"?menuop=contatos&pagina=$totalPagina\">Última Página</a>";

?>