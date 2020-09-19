<main>

  <form class="container" action="<?php echo HOME_URI;?>?path=usuario/criar" method="POST">
    <div class="form-group">
        <label for="nomeCompleto">Nome completo</label>
        <input type="text" id="name" class="form-control" name="name" aria-describedby="nomeHelp">
    </div>

    <div class="form-group">
        <label for="emailCompleto">Endereço de e-mail</label>
        <input type="email" id="email" class="form-control" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu e-mail com mais ninguém.</small>
    </div>

    <div class="form-group">
        <label for="senhaCompleto">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha">
        <small id="senhaHelp" class="form-text text-muted">Sua senha está segura com nós.</small>
    </div>

    <div class="form-group">
        <label for="senhaconfirmaCompleto">Confirme sua senha</label>
        <input type="password" class="form-control" id="senha" name="senha_confirmacao">
        <small id="senhaHelp" class="form-text text-muted">Digite novamente sua senha.</small>
    </div>

    <button type="submit" class="btn btn-primary" name="button" value="Log In">Entrar</button>

    <div id="formFooter" class="text-center">
        <a class="underlineHover" href="<?php echo HOME_URI;?>?path=usuario/logar">Já tenho conta!</a>
    </div>
  </form>

    <br><br><br><br><br>

</main>