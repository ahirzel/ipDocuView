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
	$pfad="\\xampp\\htdocs\\PHP\\IP_DocuView\\DocuView\\$typ";
	$handle=opendir($pfad);
	
while ($firma = readdir ($handle)) 
	{
		echo "	<form action=\"folderauswahl.php\" method=\"post\">";
		echo "	<p>";
		echo "	<input type=\"hidden\" size=\"20\" name=\"typ\" value=\"$typ\">";
		echo "	<input type=\"hidden\" size=\"20\" name=\"firma\" value=\"$firma\">";
		echo "	<input type=\"submit\" name=\"submit\" value=\"$firma\">";
		echo "	</p>";
		echo "	</form>";
	}
	closedir($handle);

	
	print_r($_SESSION);
	

	
	//echo "<p>Session-ID = " .session_id();
		?>

</body>
</html>