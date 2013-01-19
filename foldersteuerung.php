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
	$typ=$_POST["typ"];
	$firma=$_POST["firma"];
	$folder=$_POST["folder"];
	$pfad="\\xampp\\htdocs\\PHP\\IP_DocuView\\DocuView\\$typ\\$firma\\$folder";
	$url="DocuView/$typ/$firma/$folder";
	$handle=opendir($pfad);


	
while ($datei = readdir ($handle)) 
	{
		echo "<li><a href=\"$url/$datei\">$datei</a></li>";
	}
	
	closedir($handle);

	
	print_r($_SESSION);
	

	
	//echo "<p>Session-ID = " .session_id();
		?>
	
</body>
</html>