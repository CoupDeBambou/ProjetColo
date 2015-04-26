<?php

	
}

$server = new SoapServer();
$server->setClass("Colo");
$server->handle();
?>