<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membres', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
?>
<html>
	<head>
		<title>test tuto</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div align="center">
			<h1>Profil de <?php echo $userinfo['pseudo']; ?></h1>
			<br /><br />
			Pseudo : <?php echo $userinfo['pseudo']; ?>
			<br />
			Mail : <?php echo $userinfo['mail']; ?>
	        <br />
	        <?php
	        if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
	        {
	        ?>
	        <a href="deconnexion.php">Se déconnecter</a>
	        <a href="reception.php">Mes messages</a>
	        <?php
	        }
	        ?>
	    </div>
	</body>
</html>
<?php
}
?>

