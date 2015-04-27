<?php
echo "test connexion bdd";

$hostname='localhost';
$login='root';
$passwd='';
$base='projetcolo';
// connexion au serveur
$dbconn = mysqli_connect($hostname,$login,$passwd, $base) or die("Error " . mysqli_error($link)); 

// verif de connexion
if (!$dbconn) {
  echo "<br />erreur : ";
} else {
	echo "<br /> ok connecté";
}

// requete
$query = "SELECT * FROM utilisateur";


// execution de la requete
$result = $dbconn->query($query);
// mise sous forme de tableau de la requete
$arrayresult = mysqli_fetch_array($result, MYSQL_NUM);
// affichage du tableau
echo "<br /> Resultat requete : ";
print_r($arrayresult);

// fermeture de la connexion 
mysqli_close($dbconn);
echo "<br />connexion close";
?>
