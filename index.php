<?php
session_start();
if (isset($_SESSION['login'])) {
	header('location:./php/menu.php');
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="./css/bootstrap-5.2.2-dist/css/bootstrap.min.css">
	<script type="text/javascript" src="./css/bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/estilo.css">
	<script src="./js/jquery-3.6.0.min.js"></script>
	<title></title>
	<script>
		$(document).ready(function(){
  		$("#logar").click(function(){
  			$.ajax({
  				url: "./php/login.php",
  				type: "POST",
  				data: "login="+$("#login").val()+"&senha="+$("#senha").val(),
  				dataType: "html"
  			}).done(function(resposta) {
	    $("#p").html(resposta);

	}).fail(function(jqXHR, textStatus ) {
	    console.log("Request failed: " + textStatus);

	}).always(function() {
	    console.log("completou");
	});
  				});
			});
</script>
</head>
	<body>
		<p id="p"></p>
		<div class="container pt-3 mt-5 col-sm-4" id="login-css">
			<div class="content">
				<div class="title" id="div-title">
					<h2>Faça seu login</h2>
				</div>
				<div class="body">
					Digite seu login:<br>
					<input type="text" class="form-control" id="login">
					<br>
					Insira sua senha:<br>
					<input type="password" class="form-control" id="senha">
					<br>
					<center><a style="color: black;" href="cadastro_1.php">Caso não tenha sua conta, crie agora!</a></center>
				</div>
				<br>
				<div class="" id="footer">
					<center><button style="background: silver;" class="btn btn mt-2 col-sm-6" id="logar">Entrar</button></center>
				</div>
			</div>
		</div>
	</body>
</html>
<?php }?>