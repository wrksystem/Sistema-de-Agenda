<header>
    <h3>Atualizar Contato</h3>
</header>

<!--operação de atualização do registro do banco de dados-->
<?php

    $idContato = mysqli_real_escape_string($conexao, $_POST["idContato"]);
    $nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]);
    $emailContato = mysqli_real_escape_string($conexao, $_POST["emailContato"]);
    $telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]);
    $enderecoContato = mysqli_real_escape_string($conexao, $_POST["enderecoContato"]);
    $sexoContato = mysqli_real_escape_string($conexao, $_POST["sexoContato"]);
    $dataNascContato = mysqli_real_escape_string($conexao, $_POST["dataNascContato"]);
    $sql = "UPDATE dbcontatos SET
        nomeContato = '{$nomeContato}',
        emailContato = '{$emailContato}',
        telefoneContato = '{$telefoneContato}',
        sexoContato = '{$sexoContato}',
        enderecoContato = '{$enderecoContato}',
        dataNascContato = '{$dataNascContato}'
        WHERE idContato = '{$idContato}'
        ";
        mysqli_query($conexao, $sql) or die("Erro ao executar a consulta. " . mysqli_error($conexao));

        echo "O registro foi atualizado com sucesso!";

?>