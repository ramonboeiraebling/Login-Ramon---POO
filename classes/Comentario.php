<?php

class Comentario{
    private $id;
    private $comentario;
    private $data;
    private $noticia;
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
    public function setComentario($comentario){
        $this->comentario=$comentario;
    }
    
    /**
     * @access public
     * @return String
    */
    public function getComentario(){
        return $this->comentario;
    }

    /**
     * @access public
     * @param String
    */
    public function setDatad($data){
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
    public function setNoticia($noticia){
        $this->noticia=$noticia;
    }
    
    /**
     * @access public
     * @return String
    */
    public function getNoticia(){
        return $this->noticia;
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
     * Método responsável por salvar os comentários
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function salvar($id_noticia){
        $comentario = $_POST['comentario'];
        var_dump($_POST);
        if( isset ($_SESSION['nome']) ){
            $nome = $_SESSION['nome'];
        } 
        else{
            $nome = "Anônimo";
        }
        
        $sql="INSERT INTO comentario (nome,comentario,noticia_id) VALUES ('$nome','$comentario','$id_noticia')";
        $conexao=Conexao::getConexao();
        $conexao->query($sql);
        header("location:".HOME_URI."?path=noticia/ver/".$id_noticia);
    }

     /**
     * Método responsável por listar os comentários
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function listar_comentario($id_noticia){
        $exibir = "SELECT nome,comentario,id FROM comentario WHERE noticia_id = $id_noticia";
        

        $conexao=Conexao::getConexao();
        $resultado = $conexao->query($exibir);

        $comentarios=null;
        while($comentario=$resultado->fetch(PDO::FETCH_OBJ)){
            $comentarios[]=$comentario;
        }

        return $comentarios;

    }

     /**
     * Método responsável por excluir os comentários
     * @access public
     * @author Ramon Ebling
     * @since 14/09/2020
     * @version 0.1
    */
    public function excluir_comentario($comentario_id){
        $conexao=Conexao::getConexao();
        $apagar_noticia=$conexao->query(
            "DELETE FROM comentario WHERE id = $comentario_id"
        );

        $apagar_comentario=$conexao->query(
            "DELETE FROM comentario WHERE comentario_id = $comentario_id"
        );

        header("location:".HOME_URI."?path=noticia");
    }

}