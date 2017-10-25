<!DOCTYPE html>

 //*****************
	require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = '@gmail.com';          // SMTP username
$mail->Password = ''; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

//$mail->setFrom('mohamedpacha16@gmail.com', 'Systeme de reclamation');
//$mail->addReplyTo('mohamedpacha16@gmail.com', 'Systeme de reclamation');
//$mail->addAddress('mohamedmouldi.slama@esprit.tn');   // Add a recipient
$mail->isHTML(false);  // Set email format to HTML

$mail->addAddress("sou.belguith@gmail.com");
$bodyContent .= $mail_message;

$mail->Subject = $mail_subject;
$mail->Body    = $bodyContent;

	$mail->From = $mail_from;  
    $mail->FromName = $name;
    

$mail->send();

<?php
  include 'connexion.php';
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = '@gmail.com';          // SMTP username
$mail->Password = ''; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('mohamedpacha16@gmail.com', 'Systeme de reclamation');
$mail->addReplyTo('mohamedpacha16@gmail.com', 'Systeme de reclamation');
//$mail->addAddress('mohamedmouldi.slama@esprit.tn');   // Add a recipient
$mail->isHTML(true);  // Set email format to HTML

if(isset($_GET['supp']))
{
	  $requete="UPDATE reclamation SET etat=1 WHERE id_reclamation=".$_GET['id_reclamation'];
     //$requete="UPDATE reclamation SET etat=1 WHERE type=\"".$_GET['type']."\"";
	//$requete="UPDATE reclamation SET etat=1 WHERE type='Probleme d'energie'";
	$mail->addAddress($_GET['email']);
	$bodyContent = '<h1>Message Envoyer Par Un Systeme De Reclamation</h1>';
$bodyContent .= '<p>Oui <b>Systeme de reclamation</b></p>';

$mail->Subject = 'Systeme de reclamation';
$mail->Body    = $bodyContent;

$mail->send();
 $bdd->exec($requete)  ; 
  echo "<script>alert(\" Voulez vous vraiment accepter cette réclamation!\")</script>"; 


}

if(isset($_GET['supp1']))
{
    //$requete2="UPDATE reclamation SET etat=0 WHERE id_reclamation=".$_GET['id_reclamation'];
	$mail->addAddress($_GET['email']);
	$bodyContent = '<h1>Message Envoyer Par Un Systeme De Reclamation</h1>';
$bodyContent .= '<p>non <b>Systeme de reclamation</b></p>';

$mail->Subject = 'Systeme de reclamation';
$mail->Body    = $bodyContent;

$mail->send();
     $bdd->exec($requete2);

}


  ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
               
                <li class="dropdown">
                   <a href="index.php"><i class="fa fa-fw fa-power-off"></i> Déconnexion</a>
                    <ul class="dropdown-menu">
                        
                        
                        
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="personne.php"><i class="fa fa-fw fa-dashboard"></i> Liste des mobinautes</a>
                    </li>
                     <li class="active">
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Liste des reclamations</a>
                    </li>
                    <li class="active">
                        <a href="recherche.php"><i class="fa fa-fw fa-dashboard"></i> Recherche</a>
                    </li>
                   
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Liste des réclamations</small>
                        </h1>
                       
                    </div>
                </div>
             

<?php
$req = $bdd->query("SELECT * FROM reclamation ");
 ?>
<div class="row">
  <div class="col-md-0"></div>
        
        
        <div class="col-md-12">
         
 


 
 <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<table class="table" >
        <tr >
       
          <th><center><strong style="color:purple" >email</strong></center></th>
          <th><center><strong style="color:purple">image</strong></center></th>
           <th><center><strong style="color:purple">description</strong></center></th>
          <th><center><strong style="color:purple">type</strong></center></th>
         
        <th><center><strong style="color:purple">Adresse</strong></center></th>
            <th><center><strong style="color:purple">Administration</strong></center></th>
          <th><center><strong style="color:purple">Action</strong > </center></th>
        </tr>
        <?php
       while ($reclamation= $req->fetch(PDO::FETCH_ASSOC)) {
       $id=$reclamation['id_personne'];
        $id_administration=$reclamation['id_administration'];

$req1 = $bdd->query("SELECT * FROM personne where id_personne=$id");

  while ($personne= $req1->fetch(PDO::FETCH_ASSOC)) {
       $email=$personne['email'];
      
     //  echo $id_personne;
   }
   $req2 = $bdd->query("SELECT * FROM administration where id_administration=$id_administration");

  while ($administration= $req2->fetch(PDO::FETCH_ASSOC)) {
              $nom=$administration['nom'];
}$image=$reclamation["image"];
            ?>
                <tr>
                    <th> <center> <?php echo $email;?> </center></th>
                    <th> <center><?php echo "<img src='data:image/jpeg;base64,$image'>";?> </center></th>
                    <th> <center><?php echo $reclamation['description'];?> </center></th>
                     <th> <center><?php echo $reclamation['type'];?> </center></th>
                      <th> <center><?php echo $reclamation['adresse'];?> </center></th>
                        <th> <center><?php echo $nom;?> </center></th>
  
                    <th>



<a href="admin.php?id_reclamation=<?php echo $reclamation['id_reclamation'];?>&supp=ok&email=<?php echo $email;?>" onClick="return(confirm('Cette table n'est pas disponible'));"title="Accepter">


       <button type="button" class="btn btn-sm btn-primary">Accepter</button>
</a>
<a href="admin.php?id_reclamation=<?php echo $reclamation['id_reclamation'];?>&supp1=ok&email=<?php echo $email;?>" onClick="return(confirm('Voulez vous vraiment rejeter cette reclamation'));"title="rejeter">
  <button type="button" class="btn btn-danger">Rejeter</button>
</a>

 
                     </th>

                </tr>
            <?php }?>
        </table>
        </form>

                       
                                      
                                    

</div>
 <div class="col-md-0"></div>
 </div>



















<br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b><br><b>

                
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
