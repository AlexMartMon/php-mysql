<html>
	<head>
		<title>Problema</title>
	</head>
	<body>
		<?php
			# Establece conexion con la base de datos, como es de mysql usamos mysqli_connect 
			$conexion=mysqli_connect("localhost","root","","bdpruebas") or
				die("Problemas con la conexión");
			# Ejecucion de una sentencia sql
			mysqli_query($conexion,"insert into cursos(nombreCurso) values 
								   ('$_POST[curso]')")
			  or die("Problemas en el select".mysqli_error($conexion));
			# Se cierra la conexion
			mysqli_close($conexion);
			# Devuelve un mensaje de que se ha insertado correctamente
			echo "El curso fue dado de alta.";
		?>
	</body>
</html>