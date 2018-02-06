<?php

include_once("../header");

function getcount($type)
{
	$filecount = "0";

	if ($handle = opendir($type)) 
	{
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != "." && $file != "..")
			{
				if((substr_count($file, '.7z')) > 0)
				{

					$filecount += 1;
				}
				else
				{
					$newdir = $type."/".$file;
					if ($handle2 = opendir($newdir))
					{
						while (false !== ($file = readdir($handle2)))
						{
							if ($file != "." && $file != ".." && $file != "index.html" && $file != ".htaccess")
							{
								$filecount += 1;
							}
						}
					}
				}
			}
		}
	    closedir($handle);
	} 

		echo ("$filecount Sets");
}

echo("	

		<div id=text class=\"bodytext\">
			<b>Players<br/><br/></b>
			<br>
			<b><a href=http://audacious-media-player.org/index.php target=_blank>Audacious</a> (Linux):</b>
			<i>Supports all formats except 2SF, USF, KSS and WSR.</i>
			<br><br>
			<b><a href=http://www.bannister.org/software/ao.htm target=_blank>Audio Overload</a> (Windows, Linux, Mac):</b>
			<i>Supports all hosted formats except 2SF and USF.</i>
			<br><br>
			<b><a href=http://www.chipamp.org target=_blank>ChipAmp Plugin Bundle for Winamp</a> (Windows):</b>
			<i>Gives full playback support for all hosted formats except the 2SFs, KSSes and WSRs. See below.</i>
			<br><br>
			<b><a href=http://www.arc-nova.org/chiptunes/in2sf.7z target=_blank>In_Vio2SF.dll</a> (Windows):</b>
			<i>A Winamp plugin that allows 2SF playback.</i>
			<br><br>
			<b><a href=http://rbelmont.mameworld.info target=_blank>Vio2Play</a> (Linux):</b>
			<i>Standalone 2SF player.</i>
			<br><br><br>

		</div>

		<div class=\"bodytext\">
			<b>Statistics</b><br/><br/>
			<table border=0>

				<tr>
					<td>
						<a href=files.php?type=N2SF>2SF - Nintendo DS:</a>
					</td>
					<td align=right>");
						getcount(N2SF);
					echo("</td>
				</tr>

				<tr>
					<td>
						<a href=files.php?type=GBS>GBS - Gameboy:</a>
					</td>
					<td align=right>");
						getcount(GBS);
					echo("</td>
				</tr>
				<tr>
					<td>
						<a href=files.php?type=GSF>GSF - Gameboy Advance:</a>
					</td>
					<td align=right>");
						getcount(GSF);
					echo("</td>
				</tr>
				<tr>
					<td>
						<a href=files.php?type=HES>HES - PC Engine:</a>
					</td>
					<td align=right>");
						getcount(HES);
					echo("</td>
				</tr>
				<tr>
					<td>
						<a href=files.php?type=KSS>KSS - MSX:</a>
					</td>
					<td align=right>");
						getcount(KSS);
					echo("</td>
				</tr>
					<td>
						<a href=files.php?type=MIDI>MIDI - IBM PC:</a>
					</td>
					<td align=right>");
						getcount(MIDI);
					echo("</td>
				</tr>
				<tr>
					<td>
						<a href=files.php?type=NSF>NSF - NES:</a>
					</td>
					<td align=right>");
						getcount(NSF);						
					echo("</td>
				</tr>
				<tr>
					<td>
						<a href=files.php?type=PSF>PSF - Playstation:</a>
					</td>
					<td align=right>");
						getcount(PSF);
					echo("</td>
				</tr>
				<tr>
					<td>
						<a href=files.php?type=PSF2>PSF2 - Playstation 2:</a>
					</td>
					<td align=right>");
						getcount(PSF2);
					echo("</td>
				</tr>
				<tr>
					<td>
						<a href=files.php?type=SID>SID - Commodore:</a>
					</td>
					<td align=right>");
						getcount(SID);
					echo("</td>
				</tr>
				<tr>
					<td>
						<a href=files.php?type=SPC>SPC - Super NES:</a>
					</td>
					<td align=right>");
						getcount(SPC);
					echo("</td>
				</tr>
				<tr>
					<td>
						<a href=files.php?type=USF>USF - Nintendo 64:</a>
					</td>
					<td align=right>");
						getcount(USF);
						echo("</a><br/>
					</td>
				</tr>
				<tr>
					<td>
						<a href=files.php?type=VGM>VGM - Sega Master System:</a>
					</td>
					<td align=right>");
						getcount(VGM);
						echo("</a><br/>
					</td>
				</tr>
				<tr>
					<td>
						<a href=files.php?type=VGZ>VGZ - Sega Genesis/Mega Drive:</a>
					</td>
					<td align=right>");
						getcount(VGZ);
					echo("</td>
				</tr>
				<tr>
					<td>
						<a href=files.php?type=WSR>WSR - Wonderswan/Color:</a>
					</td>
					<td align=right>");
						getcount(WSR);
					echo("</td>
				</tr>
			</table>
		</div>	
	</body>
</html>

");
?>
