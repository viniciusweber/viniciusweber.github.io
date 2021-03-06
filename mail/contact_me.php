<?php
// Check for empty fields
if(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['telefone']) || empty($_POST['mensagem']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$nome = strip_tags(htmlspecialchars($_POST['nome']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$telefone = strip_tags(htmlspecialchars($_POST['telefone']));
$mensagem = strip_tags(htmlspecialchars($_POST['mensagem']));

// Create the email and send the message
$to = "vinicius.weber@hotmail.com"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "GiT Portfolio formulario:  $nome";
$body = "A mensagem a seguir foi enviada pela página do GIT através do formulário de contato do Portfolio.\n\n"."Dados preenchidos:\n\nNome: $nome\n\nEmail: $email\n\nTelefone: $telefone\n\nMensagem:\n$mensagem";
$header = "$email"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
