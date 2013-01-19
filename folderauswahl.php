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

	print_r($_SESSION);
	
	$typ=$_POST["typ"];
	$firma=$_POST["firma"];
	$pfad="\\xampp\\htdocs\\PHP\\IP_DocuView\\DocuView\\$typ\\$firma";
	$handle=opendir($pfad);
	
while ($folder = readdir ($handle)) 
	{
		echo "	<form action=\"foldersteuerung.php\" method=\"post\">";
		echo "	<p>";
		echo "	<input type=\"hidden\" size=\"20\" name=\"folder\" value=\"$folder\">";
		echo "	<input type=\"hidden\" size=\"20\" name=\"typ\" value=\"$typ\">";
		echo "	<input type=\"hidden\" size=\"20\" name=\"firma\" value=\"$firma\">";
		echo "	<input type=\"submit\" name=\"submit\" value=\"$folder\">";
		echo "	</p>";
		echo "	</form>";
	}
	closedir($handle);

	
	print_r($_SESSION);
	

	
	echo "<p>Session-ID = " .session_id();
		?>

</body>
</html>