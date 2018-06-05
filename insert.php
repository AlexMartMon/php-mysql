<html>
	<head>
		<title>Problema</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<?php
			# Establece conexion con la base de datos, como es de mysql usamos mysqli_connect 
			$conexion=mysqli_connect("localhost","root","","bdpruebas") or
				die("Problemas con la conexión");
			if (!$conexion->set_charset("utf8")) {
				printf("Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
				exit();
			} else {
				//printf("Conjunto de caracteres actual: %s\n", $conexion->character_set_name());
			}
			# Ejecucion de una sentencia sql
			/*mysqli_query($conexion,"insert into cursos(nombreCurso) values 
								   ('$_POST[curso]');")
			  or die("Problemas en la conexion".mysqli_error($conexion));*/
			  mysqli_query($conexion,"insert into alumnos(nombre,mail,codigocurso) values 
								   ('$_POST[nombre]','$_POST[mail]',$_POST[codigocurso]);")
			  or die("Problemas en la conexion".mysqli_error($conexion));
			# Se cierra la conexion
			mysqli_close($conexion);
			# Devuelve un mensaje de que se ha insertado correctamente
			echo "El curso fue dado de alta.";
		?>
	</body>
</html>