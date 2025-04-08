<?php

class ProdutosRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados): Produto
    {
        return new Produto($dados['id'],
            $dados['nome'],
            $dados['tipo'],
            $dados['preco'],
            $dados['descricao'],
            $dados['imagem'],
            $dados['quantidade']);
    }

    public function listarProdutosPorTipo($tipo): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE tipo = :tipo ORDER BY preco");
        $stmt->bindValue(':tipo', $tipo);
        $stmt->execute();

        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dados = array_map(function ($produto) {
            return $this->formarObjeto($produto);
        }, $produtos);
        
        return $dados;
    }

    public function buscarTodosProdutos(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM produtos ORDER BY preco");
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dados = array_map(function ($produto) {
            return $this->formarObjeto($produto);
        }, $produtos);
        
        return $dados;
    }

    public function guardarProduto(Produto $produto): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO produtos (nome, tipo, preco, descricao, imagem) VALUES (:nome, :tipo, :preco, :descricao, :imagem)");
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':tipo', $produto->getTipo());
        $stmt->bindValue(':preco', $produto->getPreco());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':imagem', $produto->getImagem());

        return $stmt->execute();
    }

    public function excluirProduto(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM produtos WHERE id = :id");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

}
