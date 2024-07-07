<?php
	try{
	require('conecta.php');

		$stmt = $conn->prepare('INSERT INTO tb_responsavel(nm_responsavel) VALUES(:resp)');
  		$stmt->execute(array(
    		':resp' => $_POST['resp']
  		));
  		
  		$stmt = $conn->prepare('INSERT INTO tb_forma_pag(nm_forma_pag) VALUES(:forma_pag)');
  		$stmt->execute(array(
    		':forma_pag' => $_POST['forma_pag'],
  		));

  		$stmt = $conn->prepare('INSERT INTO tb_categoria(nm_categoria) VALUES(:categoria)');
  		$stmt->execute(array(
    		':categoria' => $_POST['categoria'],
  		));

  		$stmt = $conn->prepare('INSERT INTO tb_nivel(nm_nivel) VALUES(:nivel)');
  		$stmt->execute(array(
    		':nivel' => $_POST['nivel'],
  		));

  		echo "<br>".$stmt->rowCount();

	} catch(PDOException $e) {
  		echo 'Error: ' . $e->getMessage();
	}


?>