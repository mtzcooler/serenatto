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

    public function excluirProduto(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM produtos WHERE id = :id");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

}
