<html>
	<head>
		<title>Problema</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>Alta de Alumnos</h1>
		<form action="insert.php" method="post">
			Ingrese nombre:
			<input type="text" name="nombre"><br>
			Ingrese mail:
			<input type="text" name="mail"><br>
			Seleccione el curso:
			<select name="codigocurso">
				<?php
					$conexion=mysqli_connect("localhost","root","","bdpruebas") or
						die("Problemas con la conexión");
					if (!$conexion->set_charset("utf8")) {
						printf("Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
						exit();
					} else {
						//printf("Conjunto de caracteres actual: %s\n", $conexion->character_set_name());
					}	
					$registros=mysqli_query($conexion,"select *	from cursos") or
								die("Problemas en el select:".mysqli_error($conexion));
					while($reg = mysqli_fetch_array($registros)){
						echo "<option value=$reg[codigo]>$reg[nombreCurso]</option>";
					}
				?>
			</select>
			<br>
			<input type="submit" value="Registrar"> 
			<!--<input type="text" name="curso" placeholder="nombre del curso">
			<input type="submit" value="Registrar">-->
		</form>
	</body>
</html>