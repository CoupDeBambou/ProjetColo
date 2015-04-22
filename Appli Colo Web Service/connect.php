<?php
// première étape : désactiver le cache lors de la phase de test
ini_set("soap.wsdl_cache_enabled", "0");

// on indique au serveur à quel fichier de description il est lié
$serveurSOAP = new SoapServer('HelloYou.wsdl');

$serveurSOAP->addFunction('connection');

// lancer le serveur
if ($_SERVER['REQUEST_METHOD'] == 'POST')
 
{
	$serveurSOAP->handle();
}
else
{
	//echo 'désolé, je ne comprends pas les requêtes POST, veuillez seulement utiliser GET';
}

//Fin des test WSDL

function connection ($test)
{	
	$test='';
	//echo "test connexion serveur amazon";

	// connexion au serveur
	$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=igorthewolf");

	// verif de connexion
	if (!$dbconn) {
	  //echo "<br /> //echo : erreur : " . pg_last_error($dbconn);
	  $test=$test."<br />: erreur : " . pg_last_error($dbconn);
	} else {
		//echo "<br /> //echo : ok connecté";
		$test=$test."<br />ok connecte";
	}

	// requete
	$query = "SELECT * FROM pg_catalog.pg_tables";


	// execution de la requete
	$result = pg_query($dbconn, $query);
	// mise sous forme de tableau de la requete
	$arrayresult = pg_fetch_array($result, null, PGSQL_ASSOC);
	// affichage du tableau
	//echo "<br /> //echo : Resultat requete : ";
	$test=$test."<br /> Resultat requete : ";
	print_r($arrayresult);

	// fermeture de la connexion 
	pg_close($dbconn);
	//echo "<br />//echo : connexion close";
	$test=$test."<br />connexion close";
	return $test;
}
?>