<?php
 
// premi�re �tape : d�sactiver le cache lors de la phase de test
ini_set("soap.wsdl_cache_enabled", "0");
 
// on indique au serveur � quel fichier de description il est li�
$serveurSOAP = new SoapServer('HelloYou.wsdl');
 
// ajouter la fonction getHello au serveur
$serveurSOAP->addFunction('getHello');
$serveurSOAP->addFunction('getHelloReverse');
 
// lancer le serveur
if ($_SERVER['REQUEST_METHOD'] == 'POST')
 
{
	$serveurSOAP->handle();
}
else
{
	echo 'd�sol�, je ne comprends pas les requ�tes GET, veuillez seulement utiliser POST';
}
 
function getHello($prenom, $nom)
{
	return 'Hello ' . $prenom . ' ' . $nom;
}
function getHelloReverse($prenom, $nom)
{
	return 'Hello ' . $nom . ' ' . $prenom;
}
?>

