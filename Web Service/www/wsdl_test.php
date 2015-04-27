<?php

	//tested using SoapUI version 4.5.2
	//tested eith php wsdl_client.php
	//tested eith c# visual studio 2010
	//complex data type not supported yet.
	//only support integer string and float data type.
	require_once "./wsdl.class.php";	//just include service class to use it
	
	//implement function body 
	
			
		function getHello($prenom, $nom) {
			return 'Hello ' . $prenom . ' ' . $nom;
		}
		function getHelloReverse($prenom, $nom) {
			return 'Hello ' . $nom . ' ' . $prenom;
		}
		function getConnect(){
			$hostname='localhost';
			$login='root';
			$passwd='';
			$base='projetcolo';
			// connexion au serveur
			$dbconn = mysqli_connect($hostname,$login,$passwd, $base) or die("Error " . mysqli_error($link)); 

			// verif de connexion
			if (!$dbconn) {
				$bReturn = false;
			} else {
				$bReturn = true;
			}
			
			// fermeture de la connexion 
			mysqli_close($dbconn);
			return $bReturn;
		}
		
	$e=new SSoap('Colo');	//your service name here as argument
	
	$e->register(
				'getHello',	//function name of the service
				array(		//input arguments of the function as name=>type 
					'prenom'=>'str',
					'nom'=>'str'
				),
				array(		//output arguments of the function as name=>type
					'return'=>'str'
				),
				'this function suppose to be a test'
	);
		//define another service
	$e->register(
				'getHelloReverse',
				array(
					'prenom'=>'str',
					'nom'=>'str'					
				),
				array(
					'return'=>'str'
				),
				'this is another test'
	);
	
	
	$e->register(
				'getConnect',
				array(),
				array(
					'return'=>'boolean'
				),
				'connect bdd'
	);
	
	$e->handle();		//call this method to start service handle
?>