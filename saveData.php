<?php
	$file_name = "data.txt";
	
	//faili sisu
	$entries_from_file = file_get_contents($file_name);
	//echo $entries_from_file;
	
	//string objektideks
	$entries = json_decode($entries_from_file);
	//var_dump($entries);
	//[{"name":"romil"}]
	
	//?name=nimi&ingredients=koostis
	if(isset($_GET["title"]) && isset($_GET["ingredients"])){
		//ei ole tühjad
		if(!empty($_GET["title"]) && !empty($_GET["ingredients"])){
			//lihtne objekt
			$object = new StdClass();
			$object -> title = $_GET["title"];
			$object -> ingredients = $_GET["ingredients"];
			
			//lisan objekti massiivi
			array_push($entries, $object);
			
			//salvestan faili üle, salvestan massiivi stringi kujul
			//siin võib olla ka andmebaasi salvestus
			file_put_contents($file_name, json_encode($entries));
		}
	}
	//trükin välja stringi kujul massiivi ( võib-olla lisas midagi juurde );
	echo(json_encode($entries));
?>