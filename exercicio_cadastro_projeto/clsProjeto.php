<?php
require_once('clsConexao.php');

class clsProjeto{

    private $conexao;
    
    public function __construct(){
        $this->conexao = clsConexao::getInstancia();
    }

    public function selectID($nome_projeto){
        $sql = "SELECT id_projeto 
                FROM tb_projeto 
                    WHERE nome_projeto = ?;";
        $parametros = [$nome_projeto];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function selectALL(){
        $sql = "SELECT * FROM tb_projeto;";
        $stmt = $this->conexao->executarConsulta($sql);
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($nome_projeto, $salario_projeto,  $id_equipe){
        $sql = "INSERT INTO tb_projeto (nome_projeto, salario_projeto, id_equipe)
                VALUES (?, ?, ?)";
        $parametros = [$nome_projeto, $salario_projeto, $id_equipe];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        return $stmt->affected_rows > 0;
    }

    public function delete($id_projeto){
        $sql = "DELETE FROM tb_projeto WHERE id_projeto = ?";
        $parametros = [$id_projeto];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        return $stmt->affected_rows > 0;
    }
}

?>