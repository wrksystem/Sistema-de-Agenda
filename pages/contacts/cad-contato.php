<header>
    <h3>Cadastro de Contato</h3>
</header>
<div>
    <form action="index.php?menuop=inserir-contato" method="post">
        <div>
            <label for="nomeContato">Nome</label>
            <input type="text" name="nomeContato" required>
        </div>
        <div>
            <label for="emailContato">E-mail</label>
            <input type="email" name="emailContato" required>
        </div>
        <div>
            <label for="telefoneContato">Telefone</label>
            <input type="text" name="telefoneContato" required>
        </div>
        <div>
            <label for="enderecoContato">Endereço</label>
            <input type="text" name="enderecoContato" required>
        </div>
        <div>
            <label for="sexoContato">Sexo</label>
            <input type="text" name="sexoContato" required>
        </div>
        <div>
            <label for="dataNascContato">Data de Nascimento</label>
            <input type="date" name="dataNascContato" required>
        </div>
        <div>
            <input type="submit" value="ADICIONAR" name="btnAdicionar">
        </div>
    </form>
</div>