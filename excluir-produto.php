<?php

require 'src/conexao-bd.php';
require 'src/Modelo/Produto.php';
require 'src/Repositorio/ProdutosRepositorio.php';

$repositorio = new ProdutosRepositorio($pdo);
$repositorio->excluirProduto($_POST['id']);

header('Location: admin.php');
