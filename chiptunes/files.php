
<link rel="stylesheet" type="text/css" href="http://www.arc-nova.org/mainstyle.css" /> 

<?php
	include_once("../header");


echo("	
		<div id=text class=bodytext>");


$type = $_GET['type'];
$type = strip_tags($type);

//	Security issue fix: type could scan other directories, make sure it can only scan directories inside of chiptunes
//	Function - Checks to see if a directory exists within another directory, and none start with .
function CheckDirs($DirToCheck, $DirToScan){
	//return false if . is included
	if (strpos($DirToCheck, ".") != false){
		return false;
	}

	if ($handle = opendir($DirToScan)){
		while (false != ($file = readdir($handle))){
			//check for match
			if (strpos($DirToCheck, "/")!=false){
				//slash included, scan again
				$NewSearch = substr($DirToCheck, (strpos($DirToCheck, "/")+1));
				$NewDir    = "./".substr($DirToCheck, 0, strpos($DirToCheck, "/"))."/";
				return CheckDirs($NewSearch,$NewDir);
			}else{
				if ($file == $DirToCheck){
					return true;
				}
			}
		}
	}else{
		return false;
	}	
}


if (!CheckDirs($type, ".")){
	echo ("no cheating");
}else{

//	End of Security Fix

echo("Index of $type<br/>");

$filecount = "0";

if ($handle = opendir($type)) 
{
	while (false !== ($file = readdir($handle))) 
	{
if ($file != "." && $file != ".." && $file != ".htaccess" && $file != "index.html") 
		{
			//$file = strtolower($file);
			$fileList[] = trim($file);
			$filecount = $filecount + 1;
		}
	}
	sort ($fileList);
	reset ($fileList);
	while (list ($key, $val) = each ($fileList)) 
	{
		if((substr_count($val, '.7z')) > 0)
		{
			print("<a href=\"$type/$val\">$val</a><br>");
		}
		else
		{
			echo("<a href=\"files.php?type=$type/$val\">$val</a><br>");
		}
        }
    closedir($handle);
    } 
	echo("<br>File Count: <b>$filecount</b><br>");
			echo("
		</div>	


	</body>
</html>

");
}
?>
