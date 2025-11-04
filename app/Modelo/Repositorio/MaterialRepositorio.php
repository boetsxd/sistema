<?php
// Evita erro se o arquivo for incluído mais de uma vez
// if (!class_exists('MaterialRepositorio')) {

    class MaterialRepositorio {
        private $conexao;

        // Construtor: recebe a conexão PDO
        public function __construct($conexao) {
            $this->conexao = $conexao;
        }

        // Adicionar material
        public function adicionarMaterial($nome, $quantidade, $descricao) {
            $sql = "INSERT INTO produtos_limpeza (nome, quantidade, descricao) VALUES (:nome, :quantidade, :descricao)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
            $stmt->bindParam(':descricao', $descricao);
            return $stmt->execute();
        }

        // Listar todos os materiais
        public function listarMateriais() {
            $sql = "SELECT * FROM produtos_limpeza";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Buscar material por ID
        public function buscarPorId($id) {
            $sql = "SELECT * FROM produtos_limpeza WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // Atualizar material
        public function atualizarMaterial($id, $nome, $quantidade, $descricao) {
            $sql = "UPDATE produtos_limpeza SET nome = :nome, quantidade = :quantidade, descricao = :descricao WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }

        // Deletar material
        public function deletarMaterial($id) {
            $sql = "DELETE FROM produtos_limpeza WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
    }
// }
?>