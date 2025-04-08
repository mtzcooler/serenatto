<?php

class Produto
{
    private $id;
    private $nome;
    private $tipo;
    private $preco;
    private $descricao;
    private $imagem;
    private $quantidade;

    public function __construct($id, $nome, $tipo, $preco, $descricao, $imagem, $quantidade)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->quantidade = $quantidade;
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

    public function getPreco()
    {
        return $this->preco;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
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
