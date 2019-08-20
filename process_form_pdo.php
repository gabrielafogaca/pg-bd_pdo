<?php
//Obtém os valores do formulário
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$comments = $_POST['comments'];

//Conecta com o BD
$dbhost = 'localhost';
$dbuser = 'aluno';
$dbpassword = 'aluno';
$dbname = 'tutorial_bd';



try {
//Efetua a conexão com BD
$conx = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
//Cria a Query SQL
$query = "INSERT INTO feedback (first_name, last_name, email, comments,feedback_date) VALUES ('$first_name', '$last_name', '$email', '$comments',NOW() )";

//Executa a Query
$conx->exec($query);
echo "Registro inserido com sucesso";

//Fecha a conexão
$conx = null;
} catch (PDOException $e) {
echo "Conexão falhou: " . $e->getMessage();
}