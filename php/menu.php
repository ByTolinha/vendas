
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-5.2.2-dist/css/bootstrap.min.css">
	<script type="text/javascript" src="../css/bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script src="../js/jquery-3.6.0.min.js"></script>
	<title></title>
	
	<script>
		$(document).ready(function(){
  		$("button").click(function(){
  			$.ajax({
  				url: "enviar-dados.php",
  				type: "POST",
  				data: "ds="+$("#ds").val()+"&dt="+$("#dt").val()+"&patual="+$("#patual").val()+"&ptotal="+$("#ptotal").val()+"&vl="+$("#vl").val()+"&idresp="+$("#idresp").val()+"&idpag="+$("#idpag").val()+"&idca="+$("#idca").val()+"&iduser="+$("#iduser").val(),
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
		<nav class="navbar mb-3 bg-dark">
			<button data-bs-toggle="modal" data-bs-target="#modal" class="btn btn-light md-2">+ add registro</button>

			<div class="modal fade" id="modal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Fazer um novo registro?<br><small>Insira os dados abaixo!</small></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						
						<div class="row">
							<div class="col-md-6">
							Descrição:
							<input type="text" class="form-control" id="ds">
						</div>
							<div class="col-md-4">
							Data da transação:
							<input type="date" class="form-control col" id="dt">
						</div>
						</div>
							Parcela atual:
							<input type="number" class="form-control" id="patual">
							Parcela total:
							<input type="number" class="form-control" id="ptotal">
							Valor:
							<input type="number" class="form-control" id="vl">

							Responsável:
							<select type="number" class="form-control" id="idresp">
								<option></option>
								<?php 
								require('conecta.php');
								$listagem = $conn->prepare("SELECT * FROM tb_responsavel");
								$listagem->execute();
								while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
									?>
								<option value="<?php echo $lista['cd_responsavel'];?>"><?php echo $lista['nm_responsavel'];?></option>
								<?php
								}
									?>
							</select><br>

							Forma de Pagamento:<br>
							<select type="number" class="form-control" id="idpag">
								<option></option>
								<?php 
								require('conecta.php');
								$listagem = $conn->prepare("SELECT * FROM tb_forma_pag");
								$listagem->execute();
								while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
									?>
								<option value="<?php echo $lista['cd_forma_pag'];?>"><?php echo $lista['nm_forma_pag'];?></option>
								<?php
								}
									?>
							</select><br>

							Categoria:<br>
							<select type="number" class="form-control" id="idca">
								<option></option>
								<?php 
								require('conecta.php');
								$listagem = $conn->prepare("SELECT * FROM tb_categoria");
								$listagem->execute();
								while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
									?>
								<option value="<?php echo $lista['cd_categoria'];?>"><?php echo $lista['nm_categoria'];?></option>
								<?php
								}
									?>
							</select><br>

							Usuário:<br>
							<select type="number" class="form-control" id="iduser">
								<option></option>
								<?php 
								require('conecta.php');
								$listagem = $conn->prepare("SELECT * FROM tb_usuario");
								$listagem->execute();
								while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
									?>
								<option value="<?php echo $lista['cd_usuario'];?>"><?php echo $lista['ds_login'];?></option>
								<?php
								}
									?>
							</select><br>
						</div>
						<div class="modal-footer">
							<button class="btn btn-light" data-bs-dismiss="modal">close</button>
							<button class="btn btn-success" data-bs-dismiss="modal">Enviar</button>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<button data-bs-toggle="modal" data-bs-target="#emmodal" class="btn btn-primary md-2">um layout ai</button>

		<div class="modal fade" id="emmodal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">

							<div class="container text-center">

  								<div class="row justify-content-around bg-light">
    								<div class="col-4"  id="dependentes">Dependentes
    									<div class="row bg-light">Filho</div>
    								</div>
    								<div class="col-4">Balanço
    									<div class="row bg-light">R$ 500,00</div>
    								</div>
    							</div>
    							<div class="row justify-content-around bg-light">
    								<div class="col-4">Categoria
    									<div class="row bg-light">casa</div>
    								</div>
    								<div class="col-4">F. pagamento
    									<div class="row bg-light">Boleto</div>
    								</div>
    							</div>
    							<div class="row justify-content-around bg-light">
    								<div class="col-4">Responsável
    									<div class="row bg-light">Savio</div>
    								</div>
    								<div class="col-4">Lanc. dependente
    									<div class="row bg-light">Oi</div>
    								</div>
  								</div>
  							
  							</div>
						
						</div>
						<div class="modal-footer">
							<button class="btn btn-light" data-bs-dismiss="modal">close</button>
							<button class="btn btn-success" data-bs-dismiss="modal">Enviar</button>
						</div>
					</div>
				</div>
			</div>

		<table class="table-md">

			<tr class="bg-light">
				<thead>
				<th>CD</th>
				<th>Descrição</th>
				<th>Data</th>
				<th>N° Parcela Atual</th>
				<th>N° Parcela Total</th>
				<th>Valor</th>
				<th>Responsaável</th>
				<th>Forma de Pagamento</th>
				<th>Categoria</th>
				<th>Login</th>
			</thead>
			</tr>

			<?php
				try {
				require('conecta.php');
				$listagem = $conn->prepare("SELECT * FROM tb_lancamento");
				$listagem->execute();
				while ($lista = $listagem->fetch(PDO::FETCH_ASSOC)) {
			?>

			<tr>
				<td><?php echo $lista['cd_lancamento'];?></td>
				<td><?php echo $lista['ds_lancamento'];?></td>
				<td><?php echo $lista['dt_lancamento'];?></td>
				<td><?php echo $lista['nr_parcela_atual'];?></td>
				<td><?php echo $lista['nr_parcela_total'];?></td>
				<td>R$ <?php echo $lista['vl_lancamento'];?></td>
				<td><?php echo $lista['id_responsavel'];?></td>
				<td><?php echo $lista['id_forma_pag'];?></td>
				<td><?php echo $lista['id_categoria'];?></td>
				<td><?php echo $lista['id_usuario'];?></td>
			</tr>
			<?php
  					}
				} catch(PDOException $e) {
    
				}
			?>
		</table>
		<h6 style="padding: 10px">Terminar envio de dados &nbsp;<a href="responsavel.php" style="color: black;">AQUI!</a></h6>

</body>
</html>