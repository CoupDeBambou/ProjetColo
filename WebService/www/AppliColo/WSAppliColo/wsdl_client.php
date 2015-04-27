<?php
	//client side test to use for wsdl.class.php
	$url = "http://localhost/wsdl_test.php?wsdl";
    $client = new SoapClient($url);
    $client->decode_utf8 = false;
    echo $client->getHello('Marc','Assin');
?>