<?php

require 'src/conexao-bd.php';
require 'src/Modelo/Produto.php';
require 'src/Repositorio/ProdutosRepositorio.php';

$repositorio = new ProdutosRepositorio($pdo);

$produtos = $repositorio->buscarTodosProdutos();

?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<table>
    <thead>
    <tr>
        <th>Produto</th>
        <th>Tipo</th>
        <th>Descricão</th>
        <th>Valor</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($produtos as $produto): ?>
    <tr>
    <td><?= $produto->getNome() ?></td>
    <td><?= $produto->getTipoFormatado() ?></td>
    <td><?= $produto->getDescricao() ?></td>
    <td><?= $produto->getPrecoFormatado() ?></td>       
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
