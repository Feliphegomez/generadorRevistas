<!DOCTYPE html>
<?php require_once('config.php'); ?>
<html lang="en" class="no-js demo-4">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="Bookblock: A Content Flip Plugin - Demo 4" />
		<meta name="keywords" content="javascript, jquery, plugin, css3, flip, page, 3d, booklet, book, perspective" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/bookblock.css" />
		<link rel="stylesheet" type="text/css" href="css/demo4.css" />
		<script src="js/modernizr.custom.js"></script>
		<script type="text/javascript" src="../dist/html2canvas.js"></script>
	</head>
	<body>
		<div class="container">
	  <script type="text/javascript" src='tinymce/tinymce.min.js'></script>
			<div class="bb-custom-wrapper">
				
				<div id="bb-bookblock" class="bb-bookblock">
					<div class="bb-item" generar="false">
						<div class="bannerTop">
							<p><img src="images/logo-allus.png" />Noti SuRallus</p>
						</div>
						<div class="bb-custom-side">
						
							<h1>Generador de Revistas
							</br>
							<span>Developer By !FelipheGomez</span>
							</br>
							<span id="totalPaginas">Paginas Totales: 0</span>
							</h1>
							<nav class="codrops-demos">
								<a href="https://github.com/Feliphegomez/generadorRevistas.git"> Descargar</a>
								<a href="https://github.com/Feliphegomez/generadorRevistas.git"> Documentacion</a>
							</nav>
						</div>
						<div class="bb-custom-side">
							<div class="">
								<div id="finish">
									<form method="POST" action="insert.php" id="finishForm" name="finishForm">
										
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<nav id="botonesPaginas">
					<a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-left"></a>
					<a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-first"></a>
					<a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-last"></a>
					<a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-right"></a>
					<a id="btAdd" href="#" class="bb-custom-icon bb-custom-icon-plus"></a>
					<a id="btRemove" href="#" class="bb-custom-icon bb-custom-icon-minus"></a>
					<a id="btCrear" href="#" class="bb-custom-icon">G</a>
				</nav>

			</div>
		</div>
		
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/feliphegomezFunciones.js"></script>
		<script src="js/jquerypp.custom.js"></script>
		<script src="js/jquery.bookblock.js"></script>
		<script type="text/javascript" src="js/html2canvas.js"></script>
		<script>

					
			$(document).ready(function(){
				//eliminarEnter("form");
				stylesConvert('.bb-item .bb-custom-side .dialogPage');
				Page.init();
			});
			
		</script>
		<script>
		</script>
	</body>
</html>
