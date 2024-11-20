<?php
require_once('clsConexao.php');

class clsEquipe{
    private $conexao;

    public function __construct(){
        $this->conexao = clsConexao::getInstancia();
    }

    public function selectALL(){
        $sql = "SELECT * FROM tb_equipe;";
        $stmt = $this->conexao->executarConsulta($sql);
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($nome_equipe){
        $sql = "INSERT INTO tb_equipe (nome_equipe) 
                VALUES (?);";
        $parametros = [$nome_equipe];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        return $stmt->affected_rows > 0;
    }

    public function delete($id_equipe){
        $sql = "DELETE FROM tb_equipe WHERE id_equipe = ?;";
        $parametros = [$id_equipe];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        return $stmt->affected_rows > 0;
    }
}


?>