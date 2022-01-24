

	<!-- Exemplo de como listar dados de uma tabela com PDO

		------Primeiro podemos chamar o documento html normal com uma tabela e seu CSS se tiver-->
		
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

td{
	width: 350px;
}
</style>
</head>
<body>
	<?php

	//Na parte do Body, podemos chamar o PHP e fazer a conexão com PDO direta

		$conexao = new PDO("mysql:dbname=seubanco; host=seuhost","usuario_banco","senha_banco");

		$argumentos = $conexao->prepare("SELECT * FROM tabela1 a INNER JOIN tabela2 b USING(idpessoa) ORDER BY idusuario");

		$argumentos->execute();

	//Após der um execute no array onde contem os dados do banco, podemos dar aqui um echo e logo apos chamar a estrutura da tabela

		echo "<table>
  			<tr>
    			<th>ID</th>
    			<th>Nome</th>
    			<th>Login</th>
    			<th>Senha</th>
    			<th>E-mail</th>

  			</tr>";

  	/*Depois disso, é hora de listar os dados com o while, ou ate mesmo com um forEach trazendo os como JSON se quiser...*/

		while ($lista = $argumentos->fetch(PDO::FETCH_ASSOC)){
			 echo "<tr>
    			<td>".$lista["idusuario"]."</td>";
    			echo"<td>".$lista["despessoa"]."</td>";
    			echo"<td>".$lista["deslogin"]."</td>";
    			echo"<td>".$lista["dessenha"]."</td>";
    			echo"<td>".$lista["desemail"]."</td>";
    		echo "</tr>";
		}
 ?>

 	<!--Feito isso, os dados podem ser passados perfeitamente utilizando o mysql juntamente com PDO :)-->

   	</table>
  </body>
</html>


