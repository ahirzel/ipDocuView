<?php

function einlesen(){
	foreach($_POST as $honig => $menge){
		if(!($honig == "submit")){
			$_SESSION[$honig] = $_POST[$honig];
		}else{
			continue;
		}
	}
}

function ausgeben(){
	$totalwert = 0;
	$kursEUR = 1.2;
	$kursUSD = 0.8;
	
	$akazienPreis = 1.10;
	$heidePreis = 1.30;
	$kleePreis = 1.40;
	$tannenPreis = 1.70;
	$preis = 0;
	
	echo "<table>";
	echo "<tr>
			<th>Honig</th>
			<th>Menge</th>
			<th>Preis</th>
			<th>Total in CHF</th>
		</tr>";
	foreach($_SESSION as $honig => $menge){
		if($honig != "Waehrung"){
		switch ($honig) {
		case "Akazienhonig":
			$preis = $akazienPreis;
			break;
		case "Heidehonig":
			$preis = $heidePreis;
			break;
		case "Kleehonig":
			$preis = $kleePreis;
			break;
		case "Tannenhonig":
			$preis = $tannenPreis;
			break;
		}
		$teilsumme = $preis * $menge;
		$totalwert += $teilsumme;

		echo "<tr> 
				<td class = \"zahlen\">" .$honig ."</td>
				<td class = \"zahlen\">" .$menge ."</td>
				<td class = \"zahlen\">" .$preis ."</td>
				<td class = \"zahlen\">" .$teilsumme ."<td>
			</tr>";
		}else{
			continue;
		}
	}
	echo		"<tr>
				<td colspan=\"3\">Totalbetrag in CHF</td>
				<td class = \"zahlen\">" .$totalwert ."</td>
			<tr>";

	/*test		
	print_r($_SESSION);
	*/
			
	//Totalwert in EUR
	if($_SESSION["Waehrung"] == "EUR"){
		echo		"<tr>
					<td colspan=\"3\">Totalbetrag in EUR</td>
					<td class = \"zahlen\">" .$totalwert * $kursEUR ."</td>
				<tr>";
	}
	
	//Totalwert in USD
	if($_SESSION["Waehrung"] == "USD"){
		echo		"<tr>
					<td colspan=\"3\">Totalbetrag in USD</td>
					<td>" .$totalwert * $kursUSD ."</td>
				<tr>";
	}
				
				
	echo		"</table>";
}

function fileSchreiben(){
	$handle = "honigbestellungen.csv";
	$ausgabe = "";
	foreach($_SESSION as $honig => $menge){
			$ausgabe = ($ausgabe .$honig .";" .$menge .";\n");
	}

	if(file_put_contents($handle, $ausgabe)){
		echo "<p> file erstellt </p>";
	}else{
		echo "<p> die daten konnten nicht ins file geschrieben werden </p>";
	}
}

?>
