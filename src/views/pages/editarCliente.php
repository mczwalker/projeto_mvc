<?php $render('header'); ?>


    <div class="container">
        <a href="<?=$base?>/"><div class="btnPadrao btnVoltar">Voltar</div></a><br>
        <form action="<?=$base?>/editarCliente/<?=$cliente['cpf_cnpj']?>" method="POST">

            <h3>Dados do Cliente</h3>
            <label>Nome<br>
                <input type="text" name="nome" value="<?=$cliente['nome']?>" size="80" required></input><br>
            </label>
            <label>Nome Fantasia<br>
                <input type="text" name="nome-fantasia" value="<?=$cliente['nome_fantasia']?>" size="80"></input><br>
            </label>
            
            
            <label>Telefone<br>
                <input type="text" name="telefone" value="<?=$cliente['telefone']?>" required ></input><br>
            </label>
            <label>E-mail<br>
                <input type="email" name="email" value="<?=$cliente['email']?>" required></input><br>
            </label>
            
            <hr>
            <h3>Endereço</h3>
            <label>CEP<br>
                <input type="text" name="cep" id="cep" maxlength="9" value="<?=$endereco['cep']?>"required></input><br>
            </label>
            <label>Endereço<br>
                <input type="text" name="endereco" id="logradouro" value="<?=$endereco['endereco']?>" required></input><br>
            </label>
            <label>Estado UF<br>
                <input type="text" name="estado" id="uf" maxlength="2" value="<?=$endereco['estado']?>" required></input><br>
            </label>
            <label>Cidade<br>
                <input type="text" name="cidade" id="localidade" value="<?=$endereco['cidade']?>" required></input><br>
            </label>
            <label>Número<br>
                <input type="text" name="numero" value="<?=$endereco['numero']?>" required></input><br>
            </label>
            <label>Complemento<br>
                <input type="text" name="complemento" value="<?=$endereco['complemento']?>"></input><br>
            </label>
            <hr>
            <h3>Contatos</h3>        
            <?php foreach($contatos as $c):?>
            <div id="contatos">
                
                <label>Nome<br>
                    <input type="text" id="nome-contato" name="nome-contato[]" value="<?=$c['nome']?>"  required></input><br>
                </label>
                <label>Telefone<br>
                    <input type="text" id="telefone-contato" name="telefone-contato[]" value="<?=$c['telefone']?>" required></input><br>
                </label>
                <label>Email<br>
                    <input type="email" id="email-contato" name="email-contato[]"value="<?=$c['email']?>"></input><br>
                </label>
                <input type="hidden" name="id-contato[]" value="<?=$c['id_contatos']?>"  required></input><br>
                <hr>
            </div>    
            <?php endforeach; ?>
            <input type="submit" value="Enviar"></input>

        <script src="<?=$base?>/js/script.js"></script>
        </form>
    </div>
</body>
</html>