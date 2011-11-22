<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta NAME="Generator" CONTENT="EditPlus">
  <meta NAME="Author" CONTENT="">
  <meta NAME="Keywords" CONTENT="">
  <meta NAME="Description" CONTENT="">
  <link rel="stylesheet" href="style.css">
  <title>XML Homework</title>

  
  
</head>
	<body>
	<div id="title">
		<div id="titletxt">States</div>
	</div>
	<div id="main">
		<?php

		$states = new states();

		if(!$_GET){
			foreach($states->state_list as $abv => $state) {
					echo '<div class="city">';
					echo '<a href="indexXML.php?q=' . strtolower($abv) . '">' . $state . "</a>";
					echo '</div>';
				}
			
			} 
			else { 
				$state = new statedata($_GET['q']);
				
				foreach($state->xml as $city) {
				echo '<div class="cityField">';
					foreach($city->children() as $data)
						{
							echo $data->getName() . ": " . $data . "<br />";
						}
					echo "<br />";
				echo '</div>';
				}
			} 

		class states {
			public $state_list = array('AL'=>"Alabama",'AK'=>"Alaska", 'AZ'=>"Arizona", 'AR'=>"Arkansas", 'CA'=>"California", 
						'CO'=>"Colorado", 'CT'=>"Connecticut", 'DE'=>"Delaware", 'DC'=>"District Of Columbia", 
						'FL'=>"Florida", 'GA'=>"Georgia", 'HI'=>"Hawaii", 'ID'=>"Idaho", 'IL'=>"Illinois", 
						'IN'=>"Indiana", 'IA'=>"Iowa", 'KS'=>"Kansas", 'KY'=>"Kentucky", 'LA'=>"Louisiana", 
						'ME'=>"Maine", 'MD'=>"Maryland", 'MA'=>"Massachusetts", 'MI'=>"Michigan", 'MN'=>"Minnesota", 
						'MS'=>"Mississippi", 'MO'=>"Missouri", 'MT'=>"Montana", 'NE'=>"Nebraska",'NV'=>"Nevada",
						'NH'=>"New Hampshire", 'NJ'=>"New Jersey", 'NM'=>"New Mexico", 'NY'=>"New York",
						'NC'=>"North Carolina", 'ND'=>"North Dakota", 'OH'=>"Ohio", 'OK'=>"Oklahoma", 
						'OR'=>"Oregon", 'PA'=>"Pennsylvania", 'RI'=>"Rhode Island", 'SC'=>"South Carolina", 
						'SD'=>"South Dakota", 'TN'=>"Tennessee", 'TX'=>"Texas", 'UT'=>"Utah", 'VT'=>"Vermont", 
						'VA'=>"Virginia", 'WA'=>"Washington", 'WV'=>"West Virginia", 'WI'=>"Wisconsin", 
						'WY'=>"Wyoming");
		}
			
		class service {
			public $xml;
			
				protected function request($url) {
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
					$data = curl_exec($ch);
					curl_close($ch);
		 
					$this->xml = new SimpleXmlElement($data, LIBXML_NOCDATA);
				
					
				}
		}	

		class statedata extends service {
			
			private $url = "http://api.sba.gov/geodata/city_county_links_for_state_of/";
			
			function __construct($state) {
				$this->url .= $state;
				$this->url .= '.xml';
				$this->request($this->url);
			}		
		}


		?>

		</div> 
		<!-- end main content -->
	</body>
</html>


