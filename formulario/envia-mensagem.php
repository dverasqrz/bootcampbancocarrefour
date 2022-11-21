<?php

$link = mysqli_connect("service-mysql", "root", "r@@tpass@@", "meubanco");

if($link === false){
  die("Erro ao se conectar! " . mysqli_connect_error());
}

// Escape user inputs for security
$nome = mysqli_real_escape_string($link, $_REQUEST['nome']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$assunto = mysqli_real_escape_string($link, $_REQUEST['assunto']);
$comentario = mysqli_real_escape_string($link, $_REQUEST['comentario']);

// Attempt insert query execution
$sql = "INSERT INTO mensagens (nome,email,assunto,comentario) VALUES ('$nome','$email','$assunto','$comentario')";
if(mysqli_query($link, $sql)){
    echo '<script type="text/javascript">
       window.onload = function () { alert("Enviado corretamente!"); } 
    </script>';
} else{
    echo "Erro ao executar o cadastro $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

?>