<?php
	require_once('config.php');
	if (!function_exists("pasarUTF8")) {
		function pasarUTF8($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
		{
		  if (PHP_VERSION < 6) {
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
		  };
		  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
			switch ($theType) {
			case "text":
			  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			  break;    
			case "long":
			case "int":
			  $theValue = ($theValue != "") ? intval($theValue) : "NULL";
			  break;
			case "double":
			  $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
			  break;
			case "date":
			  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			  break;
			case "defined":
			  $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
			  break;
		  };
		  return $theValue;
		};
	};
	
	$codigo = $_POST['pagina'];	
	$piezas = explode("<SEPARADORESWEB>", $codigo);
	$arrlength = count($piezas)-1;
	$conn = new mysqli(NAME_SERVER, USER_SERVER, PASS_SERVER, DBNAME_SERVER);
	$fechaPub = date('Y-m-d h:i:s');
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	for($x = 0; $x < $arrlength; $x++) {
		$nroPagina = $x+1;
		$titulo = urlencode(utf8_encode($_POST['nombrePublicacion']));
		$sql = sprintf("INSERT INTO " . TABLA_NAME . " (id, titulo, pagina, codigo, fecha_pub) VALUES (NULL, %s, %s, %s)",
			pasarUTF8($titulo, "text"),
			pasarUTF8($nroPagina, "int"),
			pasarUTF8($piezas[$x], "text"),
			pasarUTF8($fechaPub, "text")
		);
		
		if ($conn->query($sql) === TRUE) {
			echo "Pagina ".$nroPagina." procesada...";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	if($nroPagina == $arrlength){
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
	}
	$conn->close();
?>
