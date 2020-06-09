<?php 
$acao = $_GET['acao'];
			if($acao == 'Transferir'){
				session_start();
				if(isset($_SESSION['cpf'])){
				$cpfretira = $_SESSION['cpf'];
				$cpfrecebe = $_POST['txt_cpf'];
				$email =$_POST['txt_email'];
				$id_ingresso = $_GET['id_ingresso'];
				$id_evento = $_GET['id_evento'];
				$assunto=('neoTicket');
				$mensagem= ('Parabens, voce recebeu um ingresso');
				include 'conexao.php';
					$sql = mysql_query("select * from consumidor where cpf= $cpfrecebe");
					if(mysql_num_rows($sql) > 0 ){
							$sql2= mysql_query("delete from ingresso where id_ingresso = $id_ingresso and cpf = $cpfretira");
							$sql= mysql_query("insert into ingresso(id_ingresso,id_evento,cpf)values('$id_ingresso','$id_evento','$cpfrecebe')");
							echo "ingresso transferido";
							}else {
							echo "cpf inexistente";
							}
			}
			}
			if($acao == 'Promover'){
				$nome= $_POST['txt_nome'];
				$email= $_POST['txt_email'];
				$assunto= $_POST['txt_assunto'];
				$mensagem= $_POST['txt_mensagem'];
			 }
			
					require_once('PHPMailer-master/src/PHPMailer.php');
					require_once('PHPMailer-master/src/SMTP.php');
					require_once('PHPMailer-master/src/Exception.php');


						use PHPMailer\PHPMailer\PHPMailer;
						use PHPMailer\PHPMailer\SMTP;
						use PHPMailer\PHPMailer\Exception;

								$mail = NEW PHPMailer(true);

								try{
									$mail->SMTPDebug = smtp::DEBUG_SERVER;
									$mail->isSmtp();
									$mail->Host= 'smtp.gmail.com';
									$mail->SMTPAuth = true;
									$mail->Username = 'kaue.ribeiro98@gmail.com';
									$mail->Password = 'Kaue2269';
									$mail->Port = 587;

									$mail->setfrom('kaue.ribeiro98@gmail.com');
									$mail->addAddress($email);
									$mail->isHTML(true);
									$mail->Subject = $assunto;
									$mail->Body = $mensagem;

										if($mail->send()){
											echo "email enviado";
											header('Location: http://localhost:8080/tcc/NeoTicketWeb');
			
										}else{
											echo 'Email não enviado';
										}
									}catch (Exception $e){
									echo "erro ao enviar o email: {$mail->ErrorInfo}";
									}
							?>