
<?php
session_start();
    if(isset($_SESSION['cpf'])){
$cpfretira = $_SESSION['cpf'];    
$cpfrecebe = $_POST['txt_cpf'];
$email =$_POST['txt_email'];
$id_ingresso = $_GET['id_ingresso'];
$id_evento = $_GET['id_evento'];
include 'conexao.php';
	$sql = mysql_query("select * from consumidor where cpf= $cpfrecebe");
	if(mysql_num_rows($sql) > 0 ){
			$sql2= mysql_query("delete from ingresso where id_ingresso = $id_ingresso and cpf = $cpfretira");
			$sql= mysql_query("insert into ingresso(id_ingresso,id_evento,cpf)values($id_ingresso,$id_evento,'$cpfrecebe')");
			
			echo "ingresso transferido";

					require_once('../PHPMailer-master/src/PHPMailer.php');
					require_once('../PHPMailer-master/src/SMTP.php');
					require_once('../PHPMailer-master/src/Exception.php');
						
							

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
										$mail->Subject = ('NeoTicket');
										$mail->Body = ('Parabens, você recebeu um ingresso');

											if($mail->send()){
												echo "email enviado";
												
			
											}else{
												echo 'Email não enviado';
											}
										}catch (Exception $e){
										echo "erro ao enviar o email: {$mail->ErrorInfo}";
										}
			}else {
			echo "cpf inexistente";
			}

		}
	?>