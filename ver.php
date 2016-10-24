<!DOCTYPE html>
<?php 
	require_once('config.php');
	
	$conn = new mysqli(NAME_SERVER, USER_SERVER, PASS_SERVER, DBNAME_SERVER);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$titulosm = urlencode($_GET['titulo']);
	$sql = "SELECT * FROM ".TABLA_NAME." WHERE titulo='".$titulosm."' GROUP BY titulo";
	$result = $conn->query($sql);
	
	
?>
<html lang="en" class="no-js demo-4">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>BookBlock: A Content Flip Plugin - Demo 4</title>
		<meta name="description" content="Bookblock: A Content Flip Plugin - Demo 4" />
		<meta name="keywords" content="javascript, jquery, plugin, css3, flip, page, 3d, booklet, book, perspective" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/bookblock.css" />
		<!-- custom demo style -->
		<link rel="stylesheet" type="text/css" href="css/demo4.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="bb-custom-wrapper">
				
				<div id="bb-bookblock" class="bb-bookblock">
					<div class="bb-item">
						<div class="bb-custom-firstpage">
							<h1>
								Noti SuRallus 
								<span>Noticias Sura Asistencia</span>
							</h1>	
							
						</div>
						<div class="bb-custom-side">
							<h1>
								<?php echo utf8_decode($_GET['titulo']); ?>
							</h1>	
								
						</div>
					</div>
					
					<?php
							
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) { ?>
								<div class="bb-item" style="width: 100%;">
									<?php echo ($row['codigo']); ?>

								</div>
							<?php }
						} else {
							echo "0 results";
						}
						$conn->close();
						?>
				</div>

				<nav id="botonesPaginas">
					<a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-left"></a>
					<a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-first"></a>
					<a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-last"></a>
					<a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-right"></a>
				</nav>

			</div>

		</div><!-- /container -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/jquerypp.custom.js"></script>
		<script src="js/jquery.bookblock.js"></script>
		<script>
			$(document).ready(function(){
			   
			   $("div").each(function(i){
				  var areaeditable = $(this).attr("contenteditable");
				  if(areaeditable == "true"){
					  $(this).attr("contenteditable", "false");
				  }
			   });
			   
			});
		
			var Page = (function() {
				
				var config = {
						$bookBlock : $( '#bb-bookblock' ),
						$navNext : $( '#bb-nav-next' ),
						$navPrev : $( '#bb-nav-prev' ),
						$navFirst : $( '#bb-nav-first' ),
						$navLast : $( '#bb-nav-last' )
					},
					init = function() {
						config.$bookBlock.bookblock( {
							speed : 1000,
							shadowSides : 0.8,
							shadowFlip : 0.4
						} );
						initEvents();
					},
					initEvents = function() {
						
						var $slides = config.$bookBlock.children();

						// add navigation events
						config.$navNext.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'next' );
							return false;
						} );

						config.$navPrev.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'prev' );
							return false;
						} );

						config.$navFirst.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'first' );
							return false;
						} );

						config.$navLast.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'last' );
							return false;
						} );
						
						// add swipe events
						$slides.on( {
							'swipeleft' : function( event ) {
								config.$bookBlock.bookblock( 'next' );
								return false;
							},
							'swiperight' : function( event ) {
								config.$bookBlock.bookblock( 'prev' );
								return false;
							}
						} );

						// add keyboard events
						$( document ).keydown( function(e) {
							var keyCode = e.keyCode || e.which,
								arrow = {
									left : 37,
									up : 38,
									right : 39,
									down : 40
								};

							switch (keyCode) {
								case arrow.left:
									config.$bookBlock.bookblock( 'prev' );
									break;
								case arrow.right:
									config.$bookBlock.bookblock( 'next' );
									break;
							}
						} );
					};

					return { init : init };

			})();
		</script>
		<script>
				Page.init();
		</script>
	</body>
</html>