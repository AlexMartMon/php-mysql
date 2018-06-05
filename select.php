<html>
	<head>
		<title>Problema</title>
		<meta charset="UTF-8">
	</head>
	<body>

		<?php
			//conectamos con el servidor de base de datos y seleccionamos la base de datos
			$conexion=mysqli_connect("localhost","root","","bdpruebas") or
				die("Problemas con la conexión");
			if (!$conexion->set_charset("utf8")) {
				printf("Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
				exit();
			} else {
				printf("Conjunto de caracteres actual: %s\n", $conexion->character_set_name());
			}
			//En caso de haber codificado incorrectamente, el comando mysqli_query retorna false, 
			//por lo que se ejecuta el comando die.
			//Si es correcto, en la variable $registros se almacena una referencia a los datos de la tabla alumnos.
			$registros=mysqli_query($conexion,"select codigo,nombre, mail, codigocurso
									from alumnos") or
				die("Problemas en el select:".mysqli_error($conexion));
			//var_dump($registros);
			//Recorremos los datos
			while ($reg=mysqli_fetch_array($registros))
			{
				//imprimimos los datos del array
			  echo "Codigo:".$reg['codigo']."<br>";
			  echo "Nombre:".$reg['nombre']."<br>";
			  echo "Mail:".$reg['mail']."<br>";
			  echo "Curso:";
			  // a apartir del codigo del curso del alumnos obtendremos con otra consulta el nombre de dicho curso.
			  $registros1=mysqli_query($conexion,"select nombreCurso from cursos where codigo =  $reg[codigocurso]") 
				or die("Problemas en el select:".mysqli_error($conexion));
				while($reg1=mysqli_fetch_array($registros1)){
					echo $reg1['nombreCurso']."<br>";
				}
			  echo "<br>";
			  echo "<hr>";
			}

			mysqli_close($conexion);
		?>

	</body>
</html>