<!DOCTYPE html>

<html> 
<head>
<meta charset="utf-8" />

<title>Tabela</title>

</head> 
<body>
<h1>Tabela</h1>

<?php
//Database connection details to mySQL
$host = 'localhost';
$user = 'aluno';
$passw = 'aluno'; 
$dbname = 'atv_prt_041_bd';

try {

//Efetua a conexão com BD
$conx = new PDO("mysql:host=$host;dbname=$dbname", $user, $passw);

//Cria a Query SQL
$query = "SELECT membros.nome_completo, membros.email, escolas.nome_escola, membros.funcao, escolas.estado, equipes.nome_equipe FROM membros, equipes, escolas where membros.num_equipe = equipes.id_equipe and membros.escola = escolas.nome_escola";

//Executa a Query
$consulta = $conx->query($query);


while($row = $consulta->fetch(PDO::FETCH_ASSOC)) { 
	$table[] = $row;
}
?>

<table>
<tr>
<td><strong>Membro</strong></td>
<td width="10">&nbsp;</td>
<td><strong> Email</strong></td>
<td width="10">&nbsp;</td>
<td><strong>Escola</strong></td>
<td width="10">&nbsp;</td>
<td><strong>Função</strong></td>
<td width="10">&nbsp;</td>
<td><strong>Estado</strong></td>
<td width="10">&nbsp;</td>
<td><strong>Nome da Equipe</strong></td>
</tr>



<?php

//Verifica se há linhas para exibir
if ($table) {
//Recupera cada elemento da array
foreach($table as $d_row) {

?>
s
<tr>
<td><?php echo($d_row["membros"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["email"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["escolas"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["funcao"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["estado"]); ?></td>
<td width="10">&nbsp;</td>
<td><?php echo($d_row["nome_equipe"]); ?></td>
</tr>

<?php
}
}
?>
</table>
<?php
$number_regs = $consulta->rowCount();
?>
<p>Número de Registros : <?php echo $number_regs; ?></p>

<?php
//Fecha a conexão
$conx = null;
} catch (PDOException $e) {
echo "Conexão falhou: " . $e->getMessage();
}

?>
</body>
</html>