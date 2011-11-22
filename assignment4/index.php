<?php

$states = new states();
/*print_r($states->state_list);*/


	if(!$_GET){
		echo '<div id="city" style="background-color:#cbcbcb">';
		echo '<div style="background-color:#cbcbcb">' . "State" . '</div>';
		foreach($states->state_list as $abv => $state) {
			echo '<div class="city">';
			echo '<a href="index.php?q=' . strtolower($abv) . '">' . $state . "</a>";
			echo '</div>';
		}
		echo '</div>';
	} 

	else { 
		$state = new statedata($_GET['q']);

		foreach($state->data as $city) {
		
			foreach($city as $key => $value){
				echo '<div class="cityField_'.$key .'">';
				echo $key . ': ' . $value; 
				echo "</div> \n";
			}
			echo '</p>';
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
		public $data;
	
		protected function request($url) {
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$this->data = json_decode(curl_exec($ch));
			curl_close($ch);
			
		}
		
	}
	
	class statedata extends service {
		
		private $url = "http://api.sba.gov/geodata/city_county_links_for_state_of/";
		
		function __construct($state) {
			$this->url .= $state;
			$this->url .= '.json';
			$this->request($this->url);
		}		
	}
	

?>


