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
		//ei ole t�hjad
		if(!empty($_GET["title"]) && !empty($_GET["ingredients"])){
			//lihtne objekt
			$object = new StdClass();
			$object -> title = $_GET["title"];
			$object -> ingredients = $_GET["ingredients"];
			
			//lisan objekti massiivi
			array_push($entries, $object);
			
			//salvestan faili �le, salvestan massiivi stringi kujul
			//siin v�ib olla ka andmebaasi salvestus
			file_put_contents($file_name, json_encode($entries));
		}
	}
	//tr�kin v�lja stringi kujul massiivi ( v�ib-olla lisas midagi juurde );
	echo(json_encode($entries));
?>