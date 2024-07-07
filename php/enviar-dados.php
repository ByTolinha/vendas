<?php
	try{
	require('conecta.php');

		$stmt = $conn->prepare('INSERT INTO tb_lancamento(ds_lancamento,dt_lancamento,nr_parcela_atual,nr_parcela_total,vl_lancamento,id_responsavel,id_forma_pag,id_categoria,id_usuario) VALUES(:ds,:dt,:patual,:ptotal,:vl,:idresp,:idpag,:idca,:iduser)');
  		$stmt->execute(array(
    		':ds' => $_POST['ds'],
    		':dt' => $_POST['dt'],
    		':patual' => $_POST['patual'],
    		':ptotal' => $_POST['ptotal'],
    		':vl' => $_POST['vl'],
    		':idresp' => $_POST['idresp'],
    		':idpag' => $_POST['idpag'],
    		':idca' => $_POST['idca'],
    		':iduser' => $_POST['iduser'],

  		));

  		echo "foi";
  		echo "<br>".$stmt->rowCount();

	} catch(PDOException $e) {
  		echo 'Error: ' . $e->getMessage();
	}


?>