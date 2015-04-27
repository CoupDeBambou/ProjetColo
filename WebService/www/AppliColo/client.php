<?php
require_once('lib/nusoap.php');


$soap = new nusoap_client('http://localhost:82/applicolo/server.php?wsdl',true);
$err=$soap->getError();
echo 'Erreur : '.$err;
//$client=$soap->getProxy();
//$err=$client->getError();
echo 'Erreur : '.$err;
//$result=$soap->call("getHello",array("prenom"=>"jean","nom"=>"marc"));
//echo $result;
// executer la methode getHello
//echo $proxy->getHello('Marc','Assin');
//echo $proxy->getHelloReverse('Marc','Assin');
 
?>