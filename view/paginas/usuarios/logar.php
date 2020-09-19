<main> 

    <form class="container" action="<?php echo HOME_URI;?>?path=usuario/entrar" method="POST">
      <div class="form-group">
          <label for="exampleInputEmail1">Endereço de e-mail</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu e-mail com mais ninguém.</small>
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" class="form-control" id="senha" name="senha">
          <small id="senhaHelp" class="form-text text-muted">Sua senha está segura com nós.</small>
      </div>
      <button type="submit" class="btn btn-primary" name="button" value="Log In">Entrar</button>
    </form>

    <div id="formFooter" class="text-center">
          <a class="underlineHover" href="<?php echo HOME_URI;?>?path=usuario/add">Não tenho uma conta!</a>
      </div>

  <br><br><br><br><br><br><br><br><br><br><br><br><br>

</main>