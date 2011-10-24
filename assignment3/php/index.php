<html>
<head>
	<title>HTML with PHP</title>
</head>
<body bgcolor="#cbcbcb">
<table style="border-color:#000000; border-width:2px; border-style:solid;">
	<tr>
		<td>
			Search Engines
		</td>
		<td>
			Gaming Sites
		</td>
		<td>
			E-Commerce Sites
		</td>
		<td>
			Sports Sites
		</td>
	</tr>
	<tr>
		<?php
		$array = array();
		$array['Search Websites'] =  array ('http://www.google.com','http://www.bing.com');
		$array['Gaming Sites'] =  array ('http://www.gamestop.com','http://www.addictinggames.com');
		$array['E-Commerce Sites'] = array ('http://www.amazon.com','http://www.newegg.com');
		$array['Sports Sites'] =  array ('http://www.espn.com','http://www.sportsline.com');
	
		foreach($array as $key => $value) {
			if(is_array($value)) {
				echo "<td>";
				foreach($value as $key1 => $value1) {
				
					echo $value1 . "<br>\n";

				}
				echo "</td>";
			}
			else {
					echo $key . ' ' . $value . "Hi <br>\n";
			}
		
		}
		?>

	</tr>
	
</table>
</body>
</html>

