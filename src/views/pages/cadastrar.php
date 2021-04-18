<?php $render('header'); ?>


<div class="container">
        <a href="<?=$base?>/"><div class="btnPadrao btnVoltar">Voltar</div></a><br>
    <form action="<?=$base?>/cadastrarCliente" method="post">
        <h3>Dados do Cliente</h3>
        <label>Nome<br>
            <input type="text" name="nome" size="80" required></input><br>
        </label>
        <label>Nome Fantasia<br>
            <input type="text" name="nome-fantasia" size="80"></input><br>
        </label>
        <label>CPF/CNPJ<br>
            <input type="text" name="cpf-cnpj" id="cpf-cnpj" maxlength="18" required></input><br>
            <div id="divErro"width="100%"><p id='erroMsg'></p></div>
        </label>
        <label>Telefone<br>
            <input type="text" name="telefone" required></input><br>
        </label>
        <label>E-mail<br>
            <input type="email" name="email" required></input><br>
        </label>
        <hr>
        <h3>Endereço</h3>
        <label>CEP<br>
            <input type="text" name="cep" id="cep" maxlength="9" required></input><br>
            
        </label>
        <label>Endereço<br>
            <input type="text" name="endereco" id="logradouro" required></input><br>
        </label>
        <label>Estado UF<br>
            <input type="text" name="estado" id="uf" maxlength="2" required></input><br>
        </label>
        <label>Cidade<br>
            <input type="text" name="cidade" id="localidade" required></input><br>
        </label>
        <label>Número<br>
            <input type="text" name="numero" required></input><br>
        </label>
        <label>Complemento<br>
            <input type="text" name="complemento"></input><br>
        </label>

        <hr>
        <h3>Contatos</h3>
        <a href="#" onclick="adicionar()"><div class="btnPadrao btnAdd">Add novo contato</div></a><br>
        <div id="contatos">
            <label>Nome<br>
                <input type="text" id="nome-contato" name="nome-contato[]" required></input><br>
            </label>
            <label>Telefone<br>
                <input type="text" id="telefone-contato" name="telefone-contato[]" required></input><br>
            </label>
            <label>Email<br>
                <input type="email" id="email-contato" name="email-contato[]"></input><br>
            </label>
            <hr>            
        </div>
        <div id="contato-add"></div>
        

        <input type="submit" value="Enviar"></input>

    <script src="<?=$base?>/js/script.js"></script>
    </form>
</div>
</body>
</html>