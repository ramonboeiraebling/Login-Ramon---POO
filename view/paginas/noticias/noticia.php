<main>
    <div class="container">
        <div class="panel panel-primary">
        <div class="panel-heading"><h1><?php echo $noticia->titulo ?></h1></div>
            <?php echo $noticia->descricao?>
            <div class='data'>
                <span class="label label-primary"><?php echo $noticia->data ?></span>
                <span class="label label-primary"><?php echo " Por - ".$noticia->nome_usuario ?></span>
            </div>
            <br>
        </div>

            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                        <h3 class="panel-title">Comentarios</h3>
                        
                </div>
                <?php
                    include HOME_DIR."classes/Comentario.php";

                    $coment = new Comentario();
                    $comentarios=$coment->listar_comentario($noticia->id);

                    if($comentarios){
                        foreach($comentarios as $comentario){
                            ?>
                                <div class="coments">
                                    <h5 class="nome-user"><?php echo ($comentario->nome) ?> </h5>
                                    <p class="coment-user"><?php echo ($comentario->comentario) ?></p>
                                    <a href="<?php echo HOME_URI;?>?path=comentario/excluir_comentario/<?php echo $comentario->id; ?>"> <button class="btn btn-danger">Deletar</button> </a>
                                </div>
                                <br>
                                <?php }
                    } ?>
                    <form class="form" method="post" action="<?php echo HOME_URI?>?path=comentario/salvar/<?php echo $noticia->id?>">
                        <div class="form-group">
                            
                            <input type="text" name="comentario" class="form-control" placeholder="Adicione um comentário">
                            <br>
                            <div class="input-form">
                                <button  type="submit" class="btn btn-primary btn">Enviar comentario</button>
                            </div>
                        </div>      
                    </form>
            </div>
        </div>
    </div>

</main>
