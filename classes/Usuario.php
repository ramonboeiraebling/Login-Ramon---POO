<?php

class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;

    /**
     * @access public
     * @param Int
    */
    public function setId($id){
        $this->id=$id;
    }

    /**
     * @access public
     * @return Int
    */
    public function getId(){
        return $this->id;
    }

    /**
     * @access public
     * @param String
    */
    public function setNome($nome){
        $this->nome=$nome;
    }
    
    /**
     * @access public
     * @return String
    */
    public function getNome(){
        return $this->nome;
    }

    /**
     * @access public
     * @param String
    */
    public function setEmail($email){
        $this->email=$email;
    }
    
    /**
     * @access public
     * @return String
    */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @access public
     * @param String
    */
    public function setSenha($senha){
        $this->senha=$senha;
    }
    
    /**
     * @access public
     * @return String
    */
    public function getSenha(){
        return $this->senha;
    }


    public function index(){
       
        if(isset ($_SESSION['nome'])){
          $this->listar();  
        }
        else{
            $this->logar();
        }
    }

    /**
     * Método responsável por chamar a carregar a pagina de listar usuarios*/
    public function listar(){
        include HOME_DIR."view/paginas/usuarios/listar.php";
    }

    /**
     * Método responsável por chamar a carregar a pagina de logar usuarios
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function logar(){
        include HOME_DIR."view/paginas/usuarios/logar.php";
    }

    /**
     * Método responsável por chamar a carregar a pagina de cadastro
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function entrar(){
        $entrar = filter_input(INPUT_POST, 'button', FILTER_SANITIZE_STRING);
        if($entrar){
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
            $senha = md5 ($senha);
            //echo $senha;
            $conect=Conexao::getConexao();
                $pesquisa = $conect->query(
                    "SELECT id,nome,email FROM usuario WHERE email='$email' AND senha='$senha'"
            );
             $resultado = $pesquisa->fetch(PDO::FETCH_ASSOC);

             //var_dump($resultado);

             if($resultado){
                $_SESSION['id'] = $resultado['id'];
                $_SESSION['nome'] = $resultado['nome'];
                $_SESSION['email'] = $resultado['email'];
                include HOME_DIR."view/paginas/usuarios/listar.php";
             }
            
             else{
                include HOME_DIR."view/paginas/usuarios/logar.php";
             }

        }
        else{
            include HOME_DIR."view/paginas/usuarios/logar.php";
        }
    }

    /**
     * Método responsável por mostrar o id do usuário
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function exibir($id){
        echo "O id do usuario é".$id;
    }

    /**
     * Método responsável por chamar a carregar a pagina de logar usuarios
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function login(){
        include HOME_DIR."view/paginas/usuarios/login.php";
    }

    /**
     * Método responsável por chamar a carregar a pagina para usuario sairem da sessão
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function exit(){
        session_destroy();
        $this->logar();
    }

    /**
     * Método responsável por chamar a carregar a pagina de adicionar usuarios
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function add(){
        include HOME_DIR."view/paginas/usuarios/add_user.php";
    }

    /**
     * Método responsável por chamar a carregar a pagina de alterar usuarios
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function alterar($usuario_id){
        include HOME_DIR."view/paginas/usuarios/alterar.php";
    }

    /**
     * Método responsável por alterar usuarios
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function alterar_update($usuario_id){
        $conect=Conexao::getConexao();

        $email = $_POST['email'];
        $nome = $_POST['nome'];

        $alterar = "UPDATE usuario SET email = '$email', nome = '$nome' WHERE id = '$usuario_id'";
        $resultado = $conect->prepare($alterar);

        if($resultado->execute()){
            $this->listar(); 
        }else{
            var_dump($alterar,$resultado,$usuario_id);
        }
    }

    /**
     * Método responsável por apagar usuarios
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function apagar($usuario_id){
        $conect=Conexao::getConexao();

        $apagar = "DELETE FROM usuario WHERE id = $usuario_id";
        $resultado = $conect->prepare($apagar);

        if($resultado->execute()){
            $this->listar(); 
        }else{
            var_dump($apagar,$resultado,$usuario_id);
        }
            
    }

    /**
     * Método responsável por criar um novo usuário
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function criar(){
        $entrar = filter_input(INPUT_POST, 'button', FILTER_SANITIZE_STRING);
        if($entrar){

        $nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

        if($senha){
            $senha = md5 ($senha);
        
        $conect=Conexao::getConexao();

        $inserir = "INSERT INTO usuario (id, nome, email, senha) VALUES (0, '$nome', '$email', '$senha')";
        $resultado = $conect->prepare($inserir);
    
        if($resultado->execute()){
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            $this->logar(); 
        }
            
        else{
            include HOME_DIR."view/paginas/usuarios/add_user.php";
        }
        
        }
        else{
            include HOME_DIR."view/paginas/usuarios/add_user.php";
        }

        }
        else{
            include HOME_DIR."view/paginas/usuarios/add_user.php";
        }
}
}
