<?php

class Noticia{
    private $id;
    private $titulo;
    private $descricao;
    private $comentarios;
    private $data;
    private $usuario;

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
    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }
    
    /**
     * @access public
     * @return String
    */
    public function getTitulo(){
        return $this->titulo;
    }

    /**
     * @access public
     * @param String
    */
    public function setDescricao($descricao){
        $this->descricao=$descricao;
    }
    
    /**
     * @access public
     * @return String
    */
    public function getDescricao(){
        return $this->descricao;
    }

    /**
     * @access public
     * @param String
    */
    public function setComentarios($comentarios){
        $this->comentarios=$comentarios;
    }
    
    /**
     * @access public
     * @return String
    */
    public function getComentarios(){
        return $this->comentarios;
    }

    /**
     * @access public
     * @param String
    */
    public function setData($data){
        $this->data=$data;
    }
    
    /**
     * @access public
     * @return String
    */
    public function getData(){
    return $this->data;
    }

    /**
     * @access public
     * @param String
    */
    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    
    /**
     * @access public
     * @return String
    */
    public function getUsuario(){
        return $this->usuario;
    }

    /**
     * Método responsável por carregar a pagina inicial
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function index(){
       $this->listar();
    }

    /**
     * Método responsável por listar as noticias
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function listar(){
        $conexao=Conexao::getConexao();
        
        $resultado=$conexao->query(
            "SELECT id, titulo, descricao,DATE_FORMAT(data, '%d/%m/%Y') AS data, (SELECT nome FROM usuario WHERE id=noticia.usuario_id) AS nome_usuario FROM noticia ORDER BY id DESC LIMIT 5"
        );
        
        
        $noticias=null;
        while($noticia=$resultado->fetch(PDO::FETCH_OBJ)){
            $noticias[]=$noticia;
        }
        include HOME_DIR."view/paginas/noticias/noticias.php";
    }

    /**
     * Método responsável por salvar as noticias
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function salvar(){
            $id = $_SESSION['id'];
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $data = date('Y-m-d');

            $sql="INSERT INTO noticia (usuario_id, titulo, descricao,data) VALUES ('$id','$titulo','$descricao','$data')";
            $conexao=Conexao::getConexao();

            if($conexao->query($sql)){
                header("location:index");
            }else{
                echo("error");
                var_dump($sql,$conexao);
            }
            
    }

    /**
     * Método responsável por criar uma nova noticia
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function nova(){
        if(isset($_SESSION['usuario'])){
        }else{
            header("location:index.php");
        }
    }

    /**
     * Método responsável por carregar uma noticia
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function ver($id){
        $conexao=Conexao::getConexao();
        $resultado=$conexao->query(
            "SELECT id, titulo, descricao,DATE_FORMAT(data, '%d/%m/%Y') AS data,
             (SELECT nome FROM usuario WHERE id=noticia.usuario_id) AS nome_usuario
             FROM noticia  
             WHERE id=".$id
        );
       
        $noticia=$resultado->fetch(PDO::FETCH_OBJ);
       
        include HOME_DIR."view/paginas/noticias/noticia.php";
    }

    /**
     * Método responsável por carregar a pagina de criação de noticias
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function criar(){
        include HOME_DIR."view/paginas/noticias/criar.php";
    }
    
    /**
     * Método responsável por excluir uma noticia
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public  function excluir_noticia($noticia_id){
        $conexao=Conexao::getConexao();
        $apagar_noticia=$conexao->query(
            "DELETE FROM noticia WHERE id = $noticia_id"
        );

        $apagar_comentario=$conexao->query(
            "DELETE FROM comentario WHERE noticia_id = $noticia_id"
        );

        header("location:".HOME_URI."noticia");

    }

}


?>