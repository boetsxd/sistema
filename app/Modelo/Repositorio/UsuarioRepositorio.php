<?php
class UsuarioRepositorio {
    private $conexao;

    // Construtor: recebe a conexão PDO
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    // Método para adicionar um novo usuário (sem email)
    public function adicionarUsuario($nome, $senha) {
        $sql = "INSERT INTO usuarios (nome, senha) VALUES (:nome, :senha)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':senha', $senha);
        return $stmt->execute();
    }

    // Método para listar todos os usuários
    public function listarUsuarios() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->conexao->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para buscar um usuário pelo ID
    public function buscarPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para atualizar um usuário (sem email)
    public function atualizarUsuario($id, $nome, $senha) {
        $sql = "UPDATE usuarios SET nome = :nome, senha = :senha WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Método para deletar um usuário
    public function deletarUsuario($id) {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>