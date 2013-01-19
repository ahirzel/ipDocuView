<?php
	session_start();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" media="screen" href="style.css"  />
</head>

<body>
	<h1>Folder</h1>
	
<?php

print_r($_POST);
$pfad="\\xampp\\htdocs\\PHP\\IP_DocuView\\DocuView";
$handle=opendir($pfad);


// Schleife für Auflistung der Typen
while ($typ = readdir ($handle)) 
{
	echo "	<form action=\"firmenauswahl.php\" method=\"post\">";
	echo "	<p>";
	echo "	<input type=\"hidden\" size=\"20\" name=\"typ\" value=\"$typ\">";
	echo "	<input type=\"submit\" name=\"submit\" value=\"$typ\">";
	echo "	</p>";
	echo "	</form>";
	$_SESSION["handle"] = $typ;
}
closedir($handle);
	
print_r($_SESSION);
	
//	echo "<p>Session-ID = " .session_id();
		?>

</body>
</html>