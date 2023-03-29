<header>
    <h3><i class="bi bi-person-square"></i>Contatos</h3>
</header>

<div>
    <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad-contato"><i class="bi bi-person-plus-fill"></i> Novo Contato</a>
</div>

<div>
    <form action="index.php?menuop=contatos" method="post">
        <input type="text" name="txt_pesquisa">
        <button class="btn btn-outline-success btn-sm mb-2" type="submit"><i class="bi bi-search"></i>Pesquisar</button>
    </form>
</div>
<!--Contato Ficticio-->
<div class="tabela">
<table class="table table-dark table-striped table-bordered table-sm">
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
            <td class="text-nowrap"><?=$dados["nomeContato"] ?></td>
            <td class="text-nowrap"><?=$dados["emailContato"] ?></td>
            <td class="text-nowrap"><?=$dados["telefoneContato"] ?></td>
            <td class="text-nowrap"><?=$dados["enderecoContato"] ?></td>
            <td><?=$dados["sexoContato"] ?></td>
            <td><?=$dados["dataNascContato"] ?></td>
            <td class="text-center"><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-contato&idContato=<?=$dados["idContato"]?>"><i class="bi bi-pencil-square"></i></a></td>
            <td class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-contato&idContato=<?=$dados["idContato"]?>"><i class="bi bi-trash-fill"></i></a></td>
        </tr>

    <?php
        }
    ?>
    </tbody>
</table>
</div>

<ul class="pagination justify-content-center">
    <?php

        $sqlTotal = "SELECT idContato FROM dbcontatos";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal/$quantidade);

        echo "<li class='page-item'><span class='page-link'>Total de Registros: " . $numTotal . " </span></li> ";
        
        echo '<li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=1">Primeira Página</a></li>';

        //validação da paginação das páginas para maior
        if ($pages>6){
            ?>
              <li class="page-item"> <a class="page-link" href="?menuop=contatos&pages=<?php echo $pages-1?>"> << </a></li>
            <?php
        }

        //teste de validação da quantidade de páginas para apresentação na navegação da paginação
        for($i = 1; $i <= $totalPagina; $i++){
        
            if($i>=($pages-5) && $i <= ($pages+5)){

                if($i==$pages){
                    echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                }else{
                    echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina=$i\">$i </a></li>";
                }
            }
        }
        //validação das páginas para menor
        if ($pages < ($totalPagina-5)){
            ?>
               <li class="page-item"><a class="page-link" href="?menuop=contatos&pages=<?php echo $pages+1?>"> >> </a></li>
            <?php
        }
        //nesse caso os sinais de << e >> apenas irão aparecer quando a paginação do registros ultrapassarem
        // a quantidade 6 páginas sendo cada página com 10 registros, totalizando 60 registros para começar a paginação
        // de forma completa como apresentado na aula.
        echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina=$totalPagina\">Última Página</a></li>";

    ?>
</ul>