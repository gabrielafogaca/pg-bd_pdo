<?php
//Obtém os valores do formulário
$nome = $_POST['nome'];
$idade = $_POST['idade'];
//Conectar–se ao BD
$host = 'localhost';
$user = 'aluno';
$passw = 'aluno';
$dbname = 'atv_prt_042_bd';
try {
//Efetua a conexão com BD
$conx = new PDO("mysql:host=$host;dbname=$dbname", $user, $passw);
//Cria a Query SQL
$query = "INSERT INTO teste1 (nome, idade) VALUES ('$nome', '$idade')";
//Executa a Query
$consulta = $conx->query($query);
while($row = $consulta->fetch(PDO::FETCH_ASSOC)) { 
	$table[] = $row;
}
?>

<?php
//Fecha a conexão
$conx = null;
} catch (PDOException $e) {
echo "Conexão falhou: " . $e->getMessage();
}

?>
</body>
</html>
