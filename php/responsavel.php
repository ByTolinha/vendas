<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-5.2.2-dist/css/bootstrap.min.css">
	<script type="text/javascript" src="../css/bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js"></script>
	<script src="../js/jquery-3.6.0.min.js"></script>
	<title></title>

	<script>
		$(document).ready(function(){
  		$("#primeiro").click(function(){
  			$.ajax({
  				url: "enviar-dados-resp.php",
  				type: "POST",
  				data: "resp="+$("#resp").val()+"&forma_pag="+$("#forma_pag").val()+"&categoria="+$("#categoria").val()+"&nivel="+$("#nivel").val(),
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

		<div class="container pt-3 mt-5 col-sm-4" id="div-resp">
			<h5> Cadastre as informações:</h5>
			Responsavel:<br>
			<input type="text" class="form-control" id="resp"><br>
			Forma de pagamento:<br>
			<input type="text" class="form-control" id="forma_pag"><br>
			Categoria:<br>
			<input type="text" class="form-control" id="categoria"><br>
			Nível:<br>
			<input type="text" class="form-control" id="nivel"><br>

			<button id="primeiro" class="btn btn-light">Enviar</button>
			<button id="voltar" class="btn btn-primary" onclick="history.go(-1)">Voltar</button>
		</div>

	<p id="p"></p>

	</body>
</html>