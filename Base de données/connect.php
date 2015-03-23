<?php
echo "test connexion serveur amazon";

// connexion au serveur
$dbconn = pg_connect("host=54.171.167.38 port=5432 dbname=postgres user=postgres password=admincolo");

// verif de connexion
if (!$dbconn) {
  echo "<br />erreur : " . pg_last_error($dbconn);
} else {
	echo "<br /> ok connecté";
}

// requete
$query = "SELECT * FROM pg_catalog.pg_tables";


// execution de la requete
$result = pg_query($dbconn, $query);
// mise sous forme de tableau de la requete
$arrayresult = pg_fetch_array($result, null, PGSQL_ASSOC);
// affichage du tableau
echo "<br /> Resultat requete : ";
print_r($arrayresult);

// fermeture de la connexion 
pg_close($dbconn);
echo "<br />connexion close";
?>