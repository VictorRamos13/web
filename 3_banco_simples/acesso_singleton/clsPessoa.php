<?php
require_once 'clsConexao.php';

class clsPessoa {
    private $conexao;

    public function __construct() {
        $this->conexao = clsConexao::getInstancia();
    }

    public function inserir($nome, $idade) {
        $sql = "INSERT INTO tb_pessoa (nome_pessoa, idade_pessoa) VALUES (?, ?)";
        $parametros = [$nome, $idade];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        return $stmt->affected_rows > 0;
    }

    public function selecionarTodos() {
        $sql = "SELECT * FROM tb_pessoa";
        $stmt = $this->conexao->executarConsulta($sql);
        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function excluir($id) {
        $sql = "DELETE FROM tb_pessoa WHERE id_pessoa = ?";
        $parametros = [$id];
        $stmt = $this->conexao->executarConsulta($sql, $parametros);
        return $stmt->affected_rows > 0;
    }
}
?>