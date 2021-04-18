<?php $render('header'); ?>
  
  
    <div class="container">
        <a href="<?=$base?>/cadastrarCliente"><div class="btnPadrao">CADASTRAR NOVO CLIENTE</div></a><br>
        <table width="100%">
            <tr>
                <th>Nome ou Nome Fantasia</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
            <?php foreach($clientes as $cliente):?>
                <tr>
                    <td><?= strlen($cliente['nome_fantasia']) > 0 ? $cliente['nome_fantasia']: $cliente['nome'];?></td>
                    <td><?=$cliente['telefone'];?></td>
                    <td><?=$cliente['email'];?></td>
                    <td>
                      <div class="flex-btn">
                        <a href="<?=$base?>/deletarCliente/<?=$cliente['cpf_cnpj'];?>">
                          <div class=""><img src="img/delete.png" width="25" alt="Deletar"></div>
                        </a>
                        <a href="<?=$base?>/editarCliente/<?=$cliente['cpf_cnpj'];?>">
                          <img src="img/edit.png" width="25" alte="Editar">
                        </a>
                      </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
      </div>
  </body>
</html>

