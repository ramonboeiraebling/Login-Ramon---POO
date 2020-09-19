<main>

<div class="container">
    <form class="container" action="<?php echo HOME_URI;?>?path=usuario/entrar" method="POST">
      <div class="form-group">
          <label for="exampleInputEmail1">Novo e-mail</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu e-mail com mais ninguém.</small>
      </div>
      <div class="form-group">
        <label for="nomeCompleto">Nome completo</label>
        <input type="text" id="name" class="form-control" name="nome" aria-describedby="nomeHelp">
    </div>

      <button type="submit" class="btn btn-primary" name="button" value="Log In">Entrar</button>
    </form>

    <div id="formFooter" class="text-center">
        <a class="underlineHover" href="<?php echo HOME_URI;?>?path=usuario/logar">Já tenho conta!</a>
    </div>  
</div>

</main>