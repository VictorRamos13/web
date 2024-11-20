<?php
require_once('clsConexao.php');

class clsEquipeFuncionario{
    private $conexao;

    public function __construct(){
        $this->conexao = clsConexao::getInstancia();
    }

    public function selectALL(){
        $sql = "SELECT * FROM tb_equipe_funcionario;";
        $stmt = $this->conexao->executarConsulta($sql);
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($id_equipe, $id_funcionario){
        $sql = "INSERT INTO tb_equipe_funcionario (id_equipe, id_funcionario)
                VALUES (?, ?);";
        $parametros = [$id_equipe, $id_funcionario];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        return $stmt->affected_rows > 0;
                
    }
}





?>