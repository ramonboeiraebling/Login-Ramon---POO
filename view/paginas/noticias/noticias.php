<html>

    <main>
        <div class="container">
            <div class ="text-center">
                <a class='btn btn-info btn' href="<?php echo HOME_URI ?>?path=noticia/criar">Criar Noticia</a>
            </div>
            <br>

            <?php
            if(isset($noticias)){
                foreach($noticias AS $noticia){
                ?>

                    <h2><?php echo $noticia->titulo ?></h2>
                    <?php echo substr($noticia->descricao,0,180)." " ?><a href="<?php echo HOME_URI."?path=noticia/ver/".$noticia->id;?>">Ler mais</a>
                    <div class='data'>
                        <span class="label label-primary"><?php echo $noticia->data ?></span><span class="label label-primary"><?php echo " Por - ".$noticia->nome_usuario ?></span>
                        
                    </div>
                    <br>
                    <a href="<?php echo HOME_URI;?>?path=noticia/excluir_noticia/<?php echo $noticia->id; ?>"> <button class="btn btn-info">Deletar</button></a>
                    <br><br><br><br>                   
                <?php
                }
                }
                ?>
        </div>
    </main>

</html>