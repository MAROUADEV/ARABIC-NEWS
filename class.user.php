<?php

require_once 'dbconfig.php';

class USER
{ 

 private $conn;
 
 public function __construct()
 {
  $database = new Database();
  $db = $database->dbConnection();
  $this->conn = $db;
    }
 
 public function runQuery($sql)
 {
  $stmt = $this->conn->prepare($sql);
  return $stmt;
 }
 
 public function lasdID()
 {
  $stmt = $this->conn->lastInsertId();
  return $stmt;
 }
 
 public function register($Nom,$Prenom,$Email,$NomUtilisateur,$MotDePasse,$Code)
 {
  try
  {       
   // $MotDePasse = ($MotDePasse);
   $stmt = $this->conn->prepare("INSERT INTO utilisateur(Nom,Prenom,Email,NomUtilisateur,MotDePasse,Code) 
                                                VALUES(:Nom, :Prenom, :Email, :NomUtilisateur, :MotDePasse, :Code)");
   $stmt->bindparam(":Nom",$Nom);
   $stmt->bindparam(":Prenom",$Prenom);
   $stmt->bindparam(":Email",$Email);
   $stmt->bindparam(":NomUtilisateur",$NomUtilisateur);
   $stmt->bindparam(":MotDePasse",$MotDePasse);
   $stmt->bindparam(":Code",$Code);
   $stmt->execute(); 
   return $stmt;
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 public function login2($Email,$MotDePasse)
 {
  try
  {
   $stmt = $this->conn->prepare("SELECT * FROM utilisateur WHERE Email=:Email");
   $stmt->execute(array(":Email"=>$Email));
   $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
   
   if($stmt->rowCount() == 1)
   {
    if($userRow['Status']=="Y")
    {
     if($userRow['MotDePasse']==($MotDePasse))
     {
						$_SESSION['userSession'] = $userRow['IdUtilisateur'];
						$_SESSION['IdUtilisateur'] = $userRow['IdUtilisateur'];
						$_SESSION['Nom'] = $userRow['Nom'];
						$_SESSION['Prenom'] = $userRow['Prenom'];
						$_SESSION['Email'] = $userRow['Email'];
						$_SESSION['NomUtilisateur'] = $userRow['NomUtilisateur'];
						$_SESSION['MotDePasse'] = $userRow['MotDePasse'];
      return true;
     }
     else
     {
      header("Location: connexion.php?error");
      exit;
     }
    }
    else
    {
		$_SESSION['Email'] = $userRow['Email'];
						$_SESSION['MotDePasse'] = $userRow['MotDePasse'];
     header("Location: connexion.php?inactive");
     exit;
    } 
   }
   else
   {
    header("Location: connexion.php?error3");
    exit;
   }  
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 public function login1($NomUtilisateur,$MotDePasse)
 {
  try
  {
   $stmt = $this->conn->prepare("SELECT * FROM utilisateur WHERE NomUtilisateur=:NomUtilisateur");
   $stmt->execute(array(":NomUtilisateur"=>$NomUtilisateur));
   $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
   
   if($stmt->rowCount() == 1)
   {
    if($userRow['Status']=="Y")
    {
     if($userRow['MotDePasse']==($MotDePasse))
     {
						$_SESSION['userSession'] = $userRow['IdUtilisateur'];
						$_SESSION['IdUtilisateur'] = $userRow['IdUtilisateur'];
						$_SESSION['Nom'] = $userRow['Nom'];
						$_SESSION['Prenom'] = $userRow['Prenom'];
						$_SESSION['Email'] = $userRow['Email'];
						$_SESSION['NomUtilisateur'] = $userRow['NomUtilisateur'];
						$_SESSION['MotDePasse'] = $userRow['MotDePasse'];
      return true;
     }
     else
     {
      header("Location: connexion.php?error");
      exit;
     }
    }
    else
    {
		$_SESSION['Email'] = $userRow['Email'];
						$_SESSION['MotDePasse'] = $userRow['MotDePasse'];
     header("Location: connexion.php?inactive");
     exit;
    } 
   }
   else
   {
    header("Location: connexion.php?error2");
    exit;
   }  
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }

 
 public function is_logged_in()
 {
  if(isset($_SESSION['userSession']))
  {
   return true;
  }
 }
 
  public function is_Admin()
 {
  if(isset($_SESSION['userSession']))
  {
	  if($_SESSION['NomUtilisateur']=="DevHelp.Services")
  {
   return true;
  }
 }
 }
 
 public function redirect($url)
 {
  header("Location: $url");
 }
 
 public function logout()
 {
  session_destroy();
						$_SESSION['userSession'] = false;
						$_SESSION['IdUtilisateur']= false;
						$_SESSION['Nom'] = false;
						$_SESSION['Prenom'] = false;
						$_SESSION['Email'] = false;
						$_SESSION['NomUtilisateur'] = false;
						$_SESSION['MotDePasse'] = false;
						$_SESSION['New'] = false;
 }
    
    public function updateUser($IdUtilisateur,$Nom,$Prenom,$NomUtilisateur,$MotDePasse)
 {
  try
  {
   $stmt = $this->conn->prepare("update utilisateur set Nom=:Nom,Prenom=:Prenom,NomUtilisateur=:NomUtilisateur,MotDePasse=:MotDePasse where IdUtilisateur=:IdUtilisateur");
   $stmt->bindparam(":Nom",$Nom);
   $stmt->bindparam(":Prenom",$Prenom);
   $stmt->bindparam(":NomUtilisateur",$NomUtilisateur);
   $stmt->bindparam(":MotDePasse",$MotDePasse);
   $stmt->bindparam(":IdUtilisateur",$IdUtilisateur);
   $stmt->execute(); 
   return $stmt;
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 function send_mail($to,$message,$subject)
 {      
     

    $headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$headers .= 'From: MaghrebEco <mail-noreply@maghrebeco.com>' . "\r\n";

    /*$headers = 'From: maghrebeco.no.reply@gmail.com' . "\r\n" .
         'Reply-To:maghrebeco.no.reply@gmail.com' . "\r\n" .
         'X-Mailer: PHP/' . phpversion();*/
     mail($to,$subject,$message,$headers);
     
     
  $to = $email;

  /*$headers = "From: MaghrebEco <maghrebeco.contact@gmail.com> \r\n";

  $headers = "Reply-To: MaghrebEco <maghrebeco.contact@gmail.com> \r\n";
  
  $headers = "Content-Type: text/HTML; charset=utf-8 \r\n";

  mail($to,$subject,$message,$headers);

 
 
 
 
 
 
 
 
 
/*require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'maghrebeco.no.reply@gmail.com';
$mail->Password = 'econewsma2018';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('maghrebeco.contact@gmail.com','MaghrebEco');
$mail->addReplyTo('maghrebeco.contact@gmail.com','MaghrebEco');
$mail->addAddress($email);
$mail->Subject    = $subject;
$mail->MsgHTML($message);
$mail->send();
if(!$mail->send()){
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
 }else{
     echo 'Message has been sent';
 }*/

 
 } 
}
?>