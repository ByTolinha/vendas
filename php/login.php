<?php
$login = $_POST['login'];
$senha = $_POST['senha'];

require('conecta.php');

	$stmt = $conn->prepare("SELECT * FROM tb_usuario where ds_login = :login AND ds_senha = :senha");
	$stmt->bindValue("login", $login);
	$stmt->bindValue("senha", $senha);
	$stmt->execute();

	if ($stmt->rowCount() > 0) {
    session_start();
    $_SESSION['login'] = $login;
    echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";
	}else{
		echo "<div class='alert alert-danger alert-dimissible fade show container pt-3 mt-5 col-sm-4' role='alert'>
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			<strong>Eeeitaa, parece que alguém se enganou, não é mesmo?</strong><br>Login ou senha incorretos! Verifique suas informações.
          </div>";
	}
?>