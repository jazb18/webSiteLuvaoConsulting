
<?php
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$name = $_POST['name'];
        $emaild = $_POST['emaild'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
	
	$Mailer = new PHPMailer();
	
	//Define que será usado SMTP
	$Mailer->IsSMTP();
	
	//Enviar e-mail em HTML
	$Mailer->isHTML(true);
	
	//Aceitar carasteres especiais
	$Mailer->Charset = 'UTF-8';
	
	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'tls';
	
	//nome do servidor
	$Mailer->Host = 'smtp.luvao-consulting.com';
	//Porta de saida de e-mail 
	$Mailer->Port = 587;
	
	//Dados do e-mail de saida - autenticação
	$Mailer->Username = 'administracion@luvao-consulting.com';
	$Mailer->Password = 'administracion2017';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = 'administracion@luvao-consulting.com';
	
	//Nome do Remetente
	$Mailer->FromName = 'Mensaje de la Web';
	
	//Assunto da mensagem
	$Mailer->Subject = $subject;
	
	//Corpo da Mensagem
	//$Mailer->Body = 'Conteudo do E-mail';
	$Mailer -> Body = "From: $name <br> E-Mail: $emaild <br> Message: $message";
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = 'conteudo do E-mail em texto';
	
	//Destinatario 
	$Mailer->AddAddress('administracion@luvao-consulting.com');
	
	if($Mailer->Send()){
		echo "E-mail enviado com sucesso";
	}else{
		echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
	}
	
?>
