<?php
  require('conecta.php');
$login = $_POST['login'];
$senha = $_POST['senha'];

        //Validação
    $stmt = $conn->prepare("SELECT * FROM tb_usuario where ds_login = :login");
    $stmt->bindValue("login", $login);
    $stmt->execute();

      //Se rowCount > 0, ou seja, se o banco retornar uma linha da pesquisa, dará esse erro porque o usuario já existe
  if ($stmt->rowCount() > 0) {
    echo "<div class='alert alert-warning alert-dimissible fade show container pt-3 mt-5 col-sm-4' role='alert'>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          <strong>Ops, houve um problema!</strong><br>Esse login já está em uso!
          </div>";
  }else{
try{
        //Cadastro, se não existir no banco
    $stmt = $conn->prepare('INSERT INTO tb_usuario (ds_login,ds_senha) VALUES(:ds_login, :ds_senha)');
    $stmt->execute(array(
    ':ds_login' => $login,
    ':ds_senha' => $senha
  ));
        //Armazenando a sessão e atualizando a pág.
    session_start();
    $_SESSION['login'] = $login;
    echo "<meta HTTP-EQUIV='refresh' CONTENT='1'>";

} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
  }


?>