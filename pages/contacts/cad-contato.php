<header>
    <h3>Cadastro de Contato</h3>
</header>
<div>
    <form action="index.php?menuop=inserir-contato" method="post">
        <div class="mb-3">
            <label class="form-label" for="nomeContato">Nome</label>
            <input class="form-control" type="text" name="nomeContato" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="emailContato">E-Mail</label>
            <input class="form-control" class="form-label" type="email" name="emailContato" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="telefoneContato">Telefone</label>
            <input class="form-control" type="text" name="telefoneContato" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="enderecoContato">Endereço</label>
            <input class="form-control" type="text" name="enderecoContato" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="sexoContato">Sexo</label>
            <select class="form-control" name="sexoContato" id="sexoContato">
                <option selected>Selecione o sexo</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="dataNascContato">Data de Nascimento</label>
            <input class="form-control" type="date" name="dataNascContato" required>
        </div>
        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="ADICIONAR" name="btnAdicionar">
        </div>
    </form>
</div>