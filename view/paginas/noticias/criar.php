<main>

    <div class="container" id="formContent">
        <form action= "<?php echo HOME_URI?>?path=noticia/salvar" method="post">
          <div class="form-group">
            <label for="nomeNoticia">Titulo da notícia</label>
            <input type="text" id="titulo" class="form-control" name="titulo" aria-describedby="nomeHelp">
          </div>
          <div class="form-group">
            <label for="descricaoNoticia">Descrição da notícia</label>
            <input type="text" id="descricao" class="form-control" name="descricao" aria-describedby="nomeHelp">
          </div>

          <button type="submit" class="btn btn-primary" name="button" value="Log In">Enviar</button>
        </form>
    </div>

</main>

















