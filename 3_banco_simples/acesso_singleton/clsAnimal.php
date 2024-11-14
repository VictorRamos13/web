<?php
require_once('clsConexao.php');

class clsAnimal {
    private $conexao;

    public function __construct(){
      $this->conexao = clsConexao::getInstancia();
    }

    public function insert($nome_animal, $idade_animal, $tipo_animal, $qtd_patas_animal){

        $sql = "INSERT INTO tb_animal (nome_animal, idade_animal, tipo_animal, qtd_patas_animal)
                VALUES (?, ?, ?, ?);";
        $parametros = [$nome_animal, $idade_animal, $tipo_animal, $qtd_patas_animal];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        return $stmt->affected_rows > 0;
    }

    public function selectALL(){
        $sql = "SELECT * FROM tb_animal";
        $stmt = $this->conexao->executarConsulta($sql);
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteA($id_animal){
        $sql = "DELETE FROM tb_animal WHERE id_animal = ?";
        $parametros = [$id_animal];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        return $stmt->affected_rows > 0;
    }
}


?>