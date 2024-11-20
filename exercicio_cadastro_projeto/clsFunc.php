<?php
require_once('clsConexao.php');

class clsFuncionario{
    private $conexao;

    public function __construct(){
        $this->conexao = clsConexao::getInstancia();
    }

    public function selectID($nome_funcionario){
        $sql = "SELECT id_funcionario 
                FROM tb_funcionario 
                    WHERE nome_funcionario = ?;";
        $parametros = [$nome_funcionario];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function selectALL(){
        $sql = "SELECT * FROM tb_funcionario;";
        $stmt = $this->conexao->executarConsulta($sql);
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($nome_funcionario, $email_funcionario, $id_equipe){
        $sql = "INSERT INTO tb_funcionario (nome_funcionario, email_funcionario, id_equipe)
                VALUES (?, ?, ?)";
        $parametros = [$nome_funcionario, $email_funcionario, $id_equipe];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        return $stmt->affected_rows > 0;
    }

    public function delete($id_funcionario){
        $sql = "DELETE FROM tb_funcionario WHERE id_funcionario = ?";
        $parametros = [$id_funcionario];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        return $stmt->affected_rows > 0;
    }
    

}



?>