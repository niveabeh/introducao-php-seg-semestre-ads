<?php

//variaveis em php o $ sempre na frente e junto

//super global php 
// $_POST é uma super global, que armazena dados de forma automática 
// Armazena dados vindos de uma requisição HTTP.

// No caso de $_POST, ele contém dados enviados via método POST em um formulário html
// ['nome'] é o índice ou chave usado para acessar um elementor específico do array associativo.
// Neste exemplo "nome" é um atributo "name" do campo do formulário HTML


$nome =  $_POST['nome'];
$email = $_POST['email'];

echo "<h2> Dados Recebidos:</h2>";
echo "Nome : ". htmlspecialchars($nome)."<br>";
echo "Email : ". htmlspecialchars($email)."<br>";


?>