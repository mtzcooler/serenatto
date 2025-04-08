<?php

class Produto
{
    private ?int $id;
    private string $nome;
    private string $tipo;
    private string $preco;
    private string $descricao;
    private string $imagem;

    public function __construct(?int $id, string $nome, string $tipo, string $preco, string $descricao, string $imagem = 'logo-serenatto.png')
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getTipoFormatado()
    {
        return $this->tipo == 'cafe' ? 'Café' : 'Almoço';
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function getPrecoFormatado()
    {
        return 'R$ ' . number_format($this->getPreco(), 2, ',', '.');
    }

    public function getImagemDiretorio()
    {
        return 'img/' . $this->imagem;
    }
}
