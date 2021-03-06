<?php
require 'lib/nusoap.php';
$server = new nusoap_server ();
$server->configureWSDL("AppliColo"."urn:AppliColo");
$server->register(
		"getHello",
		array("prenom"=>"xsd:string","nom"=>"xsd:string"),
		array("return"=>"xsd:string")
		);

$server->register(
		"getHelloReverse",
		array("prenom"=>"xsd:string","nom"=>"xsd:string"),
		array("return"=>"xsd:string")
);
// lancer le serveur

$http_row_post_data = isset($http_row_post_data) ? $HTTP_ROW_POST_DATA :'';
$server->service($http_row_post_data);

function getHello($prenom, $nom) {
	return 'Hello ' . $prenom . ' ' . $nom;
}
function getHelloReverse($prenom, $nom) {
	return 'Hello ' . $nom . ' ' . $prenom;
}
?>