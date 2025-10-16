<?php

/**
 * Representa um material de limpeza ou produto do estoque,
 * baseada nos dados coletados no formulário de cadastro.
 */
class Material
{
    /**
     * @var int|null ID único do material (Chave Primária).
     */
    private $id;

    /**
     * @var string Nome do produto.
     */
    private $nome;

    /**
     * @var string Descrição detalhada do produto (Campo do formulário, 
     * * * Nota: Não mapeado diretamente na tabela SQL 'produtos_limpeza').
     */
    private $descricao;

    /**
     * @var int Quantidade atual em estoque.
     */
    private $quantidadeEstoque;

    /**
     * @var string Data de validade no formato 'YYYY-MM-DD'.
     */
    private $dataValidade;

    // =========================================================
    // Construtor
    // =========================================================

    public function __construct(
        ?int $id,
        string $nome,
        string $descricao,
        int $quantidadeEstoque,
        string $dataValidade
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->quantidadeEstoque = $quantidadeEstoque;
        $this->dataValidade = $dataValidade;
    }

    // =========================================================
    // Métodos Getter
    // =========================================================

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getQuantidadeEstoque(): int
    {
        return $this->quantidadeEstoque;
    }

    public function getDataValidade(): string
    {
        return $this->dataValidade;
    }
}