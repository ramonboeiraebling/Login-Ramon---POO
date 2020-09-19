<main>

    <div class="container">
        <div class="alert alert-success" role="alert">Bem vindo, <?php echo $_SESSION['nome']; ?>!
        </div>
        <a href="<?php echo HOME_URI;?>?path=usuario/add" class="btn">Adicionar usuário</a>
        <a href="<?php echo HOME_URI;?>?path=usuario/exit" class="btn">Sair da conta</a>
        <table class="table">
            <thead>
                <tr><td>ID</td><td>Nome</td><td>Email</td><td>Editar</td><td>Deletar</td></tr>
                <?php
                    $conect=Conexao::getConexao();
                    $resultado=$conect->prepare("SELECT id,nome, email FROM usuario ORDER BY id");
                    $resultado->execute();
                    while($usuarios=$resultado->fetch(PDO::FETCH_ASSOC)):
                ?>
                <tr>
                <td><?php echo $usuarios["id"]; ?></td> 
                <td><?php echo $usuarios["nome"]; ?></td>
                <td><?php echo $usuarios["email"]; ?></td>
                <td> <a href="<?php echo HOME_URI;?>?path=usuario/alterar/<?php echo $usuarios["id"];?>"> <button class="btn btn-info"> </button> </a> </td>
                <td> <a href="<?php echo HOME_URI;?>?path=usuario/apagar/<?php echo $usuarios["id"];?>"> <button class="btn btn-danger"> </button> </a> </td>
                </tr>
                <?php
                    endwhile;
                ?>

            </thead>
        </table>
    </div>

</main>